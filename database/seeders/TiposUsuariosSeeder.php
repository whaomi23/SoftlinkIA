<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TiposUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $tipos = [
            ['nombre' => 'administrador', 'descripcion' => 'Administrador del sistema con acceso total'],
            ['nombre' => 'creador', 'descripcion' => 'Creador de contenido que puede publicar cursos'],
            ['nombre' => 'estudiante', 'descripcion' => 'Usuario que puede inscribirse en cursos'],
            ['nombre' => 'user', 'descripcion' => 'Usuario básico con acceso al catálogo de cursos'],
            ['nombre' => 'empleado', 'descripcion' => 'Empleado de la empresa con acceso básico'],
            ['nombre' => 'marketing', 'descripcion' => 'Usuario de marketing con acceso a campañas y analítica'],
        ];

        foreach ($tipos as $tipo) {
            DB::table('tipos_usuarios')->updateOrInsert(
                ['nombre' => $tipo['nombre']],
                [
                    'descripcion' => $tipo['descripcion'],
                    'updated_at' => $now,
                    'created_at' => $now,
                ]
            );
        }
    }
}


