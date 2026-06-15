<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Traer IDs de tipos de usuarios desde la BD
        $tiposUsuarios = DB::table('tipos_usuarios')->pluck('id', 'nombre')->toArray();

        // Definir usuarios de ejemplo con contraseñas distintas según su tipo
        $usuarios = [
            [
                'name' => 'Admin',
                'apellido_paterno' => 'System',
                'apellido_materno' => 'Default',
                'email' => 'admin@softlinkia.test',
                'password' => 'admin123',
                'tipo_usuario' => 'administrador',
                'verificado' => true,
                'status' => 'activo',
            ],
            [
                'name' => 'Sofía',
                'apellido_paterno' => 'Ramírez',
                'apellido_materno' => 'Torres',
                'email' => 'sofia@softlinkia.test',
                'password' => 'admin123',
                'tipo_usuario' => 'administrador',
                'verificado' => true,
                'status' => 'activo',
            ],
            [
                'name' => 'Brayan',
                'apellido_paterno' => 'Hernández',
                'apellido_materno' => 'Alvarado',
                'email' => 'brayan@softlinkia.test',
                'password' => 'creador123', // 🔑 Para creador de contenido
                'tipo_usuario' => 'creador',
                'verificado' => true,
                'status' => 'activo',
            ],
            [
                'name' => 'Ana',
                'apellido_paterno' => 'López',
                'apellido_materno' => 'Martínez',
                'email' => 'ana@softlinkia.test',
                'password' => 'estudiante123', // 🔑 Para estudiante
                'tipo_usuario' => 'estudiante',
                'verificado' => false,
                'status' => 'inactivo',
            ],
            [
                'name' => 'Luis',
                'apellido_paterno' => 'Pérez',
                'apellido_materno' => 'García',
                'email' => 'luis@softlinkia.test',
                'password' => 'user123', // 🔑 Para user básico
                'tipo_usuario' => 'user',
                'verificado' => true,
                'status' => 'activo',
            ],
            [
                'name' => 'María',
                'apellido_paterno' => 'González',
                'apellido_materno' => 'Silva',
                'email' => 'maria.marketing@softlinkia.test',
                'password' => 'marketin123', // 🔑 Para usuario de marketing
                'tipo_usuario' => 'marketing',
                'verificado' => true,
                'status' => 'activo',
            ],
        ];

        foreach ($usuarios as $data) {
            // Buscar el ID del tipo de usuario
            $tipoId = $tiposUsuarios[$data['tipo_usuario']] ?? null;

            if (!$tipoId) {
                continue; // Si no existe el tipo, saltar
            }

            // Insertar o actualizar usuario
            DB::table('users')->updateOrInsert(
                ['email' => $data['email']], // Evita duplicados
                [
                    'name' => $data['name'],
                    'apellido_paterno' => $data['apellido_paterno'],
                    'apellido_materno' => $data['apellido_materno'],
                    'password' => Hash::make($data['password']),
                    'tipo_usuario_id' => $tipoId,
                    'verificado' => $data['verificado'],
                    'status' => $data['status'],
                    'remember_token' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
