<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KibiContact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class KibiContactManagementController extends Controller
{
    /**
     * Mostrar lista de contactos
     */
    public function index(Request $request)
    {
        // Debug: Log de acceso
        Log::info('Acceso a gestión de contactos', [
            'usuario' => Auth::user()->email,
            'tipo_usuario' => Auth::user()->tipoUsuario?->nombre,
            'timestamp' => now(),
        ]);

        $query = KibiContact::query();

        // Debug: Log de consulta
        Log::info('Consulta de contactos', [
            'total_contactos' => KibiContact::count(),
            'filtros_aplicados' => $request->only(['status', 'search']),
        ]);

        // Filtros
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'LIKE', "%{$search}%")
                  ->orWhere('apellidos', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('institucion', 'LIKE', "%{$search}%")
                  ->orWhere('puesto', 'LIKE', "%{$search}%");
            });
        }

        // Ordenamiento
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $contactos = $query->paginate(15);

        // Estadísticas
        $stats = [
            'total' => KibiContact::count(),
            'nuevos' => KibiContact::nuevos()->count(),
            'contactados' => KibiContact::contactados()->count(),
            'interesados' => KibiContact::interesados()->count(),
            'convertidos' => KibiContact::convertidos()->count(),
        ];

        return view('KIBI.admin.dashboard.contactos-solicitudes.contacts', compact('contactos', 'stats'));
    }

    /**
     * Mostrar detalles de un contacto
     */
    public function show(KibiContact $contacto)
    {
        return view('KIBI.admin.dashboard.contactos-solicitudes.contact-detail', compact('contacto'));
    }

    /**
     * Actualizar status de contacto
     */
    public function updateStatus(Request $request, KibiContact $contacto)
    {
        $request->validate([
            'status' => 'required|in:nuevo,contactado,interesado,no_interesado,convertido',
            'notas' => 'nullable|string|max:1000',
        ]);

        $contacto->cambiarStatus($request->status, $request->notas);

        Log::info('Status de contacto actualizado', [
            'contacto_id' => $contacto->id,
            'nuevo_status' => $request->status,
            'usuario' => Auth::user()->email,
            'timestamp' => now(),
        ]);

        return back()->with('success', 'Status actualizado correctamente');
    }

    /**
     * Marcar como contactado
     */
    public function markAsContacted(Request $request, KibiContact $contacto)
    {
        $request->validate([
            'notas' => 'nullable|string|max:1000',
        ]);

        $contacto->marcarComoContactado($request->notas);

        Log::info('Contacto marcado como contactado', [
            'contacto_id' => $contacto->id,
            'usuario' => Auth::user()->email,
            'timestamp' => now(),
        ]);

        return back()->with('success', 'Contacto marcado como contactado');
    }

    /**
     * Eliminar contacto
     */
    public function destroy(KibiContact $contacto)
    {
        Log::info('Contacto eliminado', [
            'contacto_id' => $contacto->id,
            'nombre' => $contacto->nombre_completo,
            'email' => $contacto->email,
            'usuario' => Auth::user()->email,
            'timestamp' => now(),
        ]);

        $contacto->delete();

        return redirect()->route('kibi.contacts.index')
            ->with('success', 'Contacto eliminado correctamente');
    }

    /**
     * Exportar contactos
     */
    public function export(Request $request)
    {
        $query = KibiContact::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $contactos = $query->get();

        $filename = 'kibi_contacts_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($contactos) {
            $file = fopen('php://output', 'w');

            // Headers del CSV
            fputcsv($file, [
                'ID', 'Nombre', 'Apellidos', 'Email', 'Celular',
                'Institución', 'Puesto', 'Ciudad', 'Estado',
                'Sitio Web', 'WhatsApp', 'Email Contact',
                'Status', 'Notas', 'Fecha Contacto', 'Creado'
            ]);

            // Datos
            foreach ($contactos as $contacto) {
                fputcsv($file, [
                    $contacto->id,
                    $contacto->nombre,
                    $contacto->apellidos,
                    $contacto->email,
                    $contacto->celular,
                    $contacto->institucion,
                    $contacto->puesto,
                    $contacto->ciudad,
                    $contacto->estado,
                    $contacto->sitio_web,
                    $contacto->whatsapp ? 'Sí' : 'No',
                    $contacto->email_contact ? 'Sí' : 'No',
                    $contacto->status,
                    $contacto->notas,
                    $contacto->contactado_at?->format('Y-m-d H:i:s'),
                    $contacto->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
