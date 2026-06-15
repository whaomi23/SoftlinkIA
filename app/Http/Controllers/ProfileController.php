<?php
//10
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar el perfil del usuario
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    /**
     * Mostrar el formulario de edición del perfil
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Actualizar el perfil del usuario
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->fill([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
        ]);
        $user->save();

        // Determinar redirección según el origen (KIBI vs SoftLinkIA)
        $redirectRoute = $request->input('redirect_to');
        if (!$redirectRoute) {
            $previous = url()->previous();
            $redirectRoute = str_contains($previous, '/kibi') ? 'kibi.profile.show' : 'profile.show';
        }

        return redirect()->route($redirectRoute)->with('success', 'Perfil actualizado correctamente.');
    }

    /**
     * Actualizar la contraseña del usuario
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = Auth::user();
        $user->fill([
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        // Determinar redirección según el origen (KIBI vs SoftLinkIA)
        $redirectRoute = $request->input('redirect_to');
        if (!$redirectRoute) {
            $previous = url()->previous();
            $redirectRoute = str_contains($previous, '/kibi') ? 'kibi.profile.show' : 'profile.show';
        }

        return redirect()->route($redirectRoute)->with('success', 'Contraseña actualizada correctamente.');
    }

    /**
     * Solicitar ser creador de contenido
     */
    public function solicitarCreador(Request $request)
    {
        $user = Auth::user();

        // Verificar que no sea ya creador o admin
        if ($user->isCreador() || $user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Ya tienes permisos de creador o administrador.'
            ], 400);
        }

        // Verificar que no tenga una solicitud pendiente
        if ($user->solicitud_creador === 'pendiente') {
            return response()->json([
                'success' => false,
                'message' => 'Ya tienes una solicitud pendiente.'
            ], 400);
        }

        // Normalizar extras vacíos a null para evitar fallos de validación (p.ej. URLs vacías)
        $input = $request->all();
        if (isset($input['extra']) && is_array($input['extra'])) {
            foreach (['categoria','portafolio','linkedin','twitter','horas','disponibilidad'] as $k) {
                if (array_key_exists($k, $input['extra']) && $input['extra'][$k] === '') {
                    $input['extra'][$k] = null;
                }
            }
            // Auto-prepend protocolo en URLs si el usuario lo omite
            foreach (['portafolio','linkedin','twitter'] as $urlKey) {
                if (!empty($input['extra'][$urlKey]) && is_string($input['extra'][$urlKey])) {
                    $val = trim($input['extra'][$urlKey]);
                    if ($val !== '' && !preg_match('/^https?:\/\//i', $val)) {
                        $input['extra'][$urlKey] = 'https://' . $val;
                    }
                }
            }
        }
        $request->replace($input);

        // Validación de campos base
        $validated = $request->validate([
            'motivo' => 'required|string|max:1000',
            'experiencia' => 'nullable|string|max:2000',
            // Campos extra opcionales (no fallan si no vienen)
            'extra.categoria' => 'nullable|string|max:100',
            'extra.portafolio' => 'nullable|url|max:255',
            'extra.linkedin' => 'nullable|url|max:255',
            'extra.twitter' => 'nullable|url|max:255',
            'extra.horas' => 'nullable|numeric|min:1|max:80',
            'extra.disponibilidad' => 'nullable|string|max:100',
        ]);

        // Construir un resumen de extras para adjuntar a la experiencia
        $extra = $request->input('extra', []);
        $bloqueExtras = [];
        $mapLabels = [
            'categoria' => 'Categoría principal',
            'horas' => 'Dedicación (horas/sem)',
            'disponibilidad' => 'Disponibilidad',
            'portafolio' => 'Portafolio',
            'linkedin' => 'LinkedIn',
            'twitter' => 'Twitter/X',
        ];
        foreach ($mapLabels as $key => $label) {
            if (!empty($extra[$key])) {
                $valor = is_string($extra[$key]) ? trim($extra[$key]) : $extra[$key];
                $bloqueExtras[] = "- {$label}: {$valor}";
            }
        }
        $extraTexto = count($bloqueExtras) > 0
            ? "\n\n—— Datos adicionales de la solicitud ——\n" . implode("\n", $bloqueExtras)
            : '';

        // Preparar experiencia combinada (lo que ya escribió + resumen extra)
        $experienciaFinal = ($validated['experiencia'] ?? '') . $extraTexto;

        $user->update([
            'solicitud_creador' => 'pendiente',
            'motivo_solicitud' => $validated['motivo'],
            'experiencia_solicitud' => $experienciaFinal,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Solicitud enviada correctamente.'
        ]);
    }
}
