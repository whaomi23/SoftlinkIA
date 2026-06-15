<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Subnivel;
use App\Models\User;
use App\Models\Categoria;

class CursoConNivelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🚀 Creando cursos con niveles y subniveles...');

        // Obtener usuario creador (admin)
        $creador = User::where('email', 'admin@softlinkia.test')->first();
        if (!$creador) {
            $this->command->error('❌ No se encontró usuario admin. Ejecuta primero UsersSeeder.');
            return;
        }

        // Obtener o crear categoría
        $categoria = Categoria::firstOrCreate([
            'nombre' => 'Programación'
        ], [
            'descripcion' => 'Cursos de programación y desarrollo de software',
            'activa' => true
        ]);

        // Crear curso de ejemplo
        $curso = $this->crearCurso([
            'titulo' => 'JavaScript Completo: De Principiante a Experto',
            'descripcion' => 'Aprende JavaScript desde cero hasta nivel avanzado. Incluye ES6+, DOM, APIs, y proyectos reales.',
            'precio' => 149.99,
            'duracion_horas' => 40,
            'nivel' => 'intermedio',
            'activo' => true,
            'cupo_maximo' => 30,
            'fecha_inicio' => now()->addDays(7),
            'fecha_fin' => now()->addDays(90),
            'slug' => 'javascript-completo-principiante-experto-' . time(),
            'requisitos' => 'Conocimientos básicos de HTML y CSS. No se requiere experiencia previa en programación.',
            'creador_id' => $creador->id,
            'categoria_id' => $categoria->id,
        ]);

        // Crear niveles y subniveles
        $this->crearNivelesParaCurso($curso);

        $this->command->info('✅ Curso con niveles y subniveles creado exitosamente!');
    }

    private function crearCurso(array $datos): Curso
    {
        $curso = Curso::create($datos);
        $this->command->info("📚 Curso creado: {$curso->titulo}");
        return $curso;
    }

    private function crearNivelesParaCurso(Curso $curso): void
    {
        // Nivel 1: Fundamentos
        $nivel1 = Nivel::create([
            'curso_id' => $curso->id,
            'numero' => 1,
            'titulo' => 'Fundamentos de JavaScript',
            'descripcion' => 'Aprende los conceptos básicos del lenguaje JavaScript',
        ]);

        $this->command->info("  🎯 Nivel creado: {$nivel1->titulo}");

        // Subniveles del Nivel 1
        Subnivel::create([
            'nivel_id' => $nivel1->id,
            'numero' => 1,
            'titulo' => 'Variables y Tipos de Datos',
            'descripcion' => 'Declaración de variables con let, const y var. Tipos primitivos y objetos.',
            'url_iframe' => '<iframe src="https://codepen.io/embed/ejemplo-variables" width="100%" height="300"></iframe>',
            'recurso_nombre' => 'ejercicios-variables.pdf',
            'recurso_tipo' => 'pdf'
        ]);

        Subnivel::create([
            'nivel_id' => $nivel1->id,
            'numero' => 2,
            'titulo' => 'Funciones Básicas',
            'descripcion' => 'Crear y usar funciones. Parámetros, return, y scope.',
            'url_iframe' => '<iframe src="https://codepen.io/embed/ejemplo-funciones" width="100%" height="300"></iframe>',
            'recurso_nombre' => 'practica-funciones.pdf',
            'recurso_tipo' => 'pdf'
        ]);

        Subnivel::create([
            'nivel_id' => $nivel1->id,
            'numero' => 3,
            'titulo' => 'Arrays y Objetos',
            'descripcion' => 'Manipulación de arrays y objetos. Métodos útiles.',
            'url_iframe' => '<iframe src="https://codepen.io/embed/ejemplo-arrays" width="100%" height="300"></iframe>',
            'recurso_nombre' => 'ejercicios-arrays.pdf',
            'recurso_tipo' => 'pdf'
        ]);

        $this->command->info("    📋 3 subniveles creados para nivel 1");

        // Nivel 2: DOM y Eventos
        $nivel2 = Nivel::create([
            'curso_id' => $curso->id,
            'numero' => 2,
            'titulo' => 'DOM y Eventos',
            'descripcion' => 'Manipulación del DOM y manejo de eventos del usuario',
        ]);

        $this->command->info("  🎯 Nivel creado: {$nivel2->titulo}");

        // Subniveles del Nivel 2
        Subnivel::create([
            'nivel_id' => $nivel2->id,
            'numero' => 1,
            'titulo' => 'Selección de Elementos',
            'descripcion' => 'getElementById, querySelector, querySelectorAll y más.',
            'url_iframe' => '<iframe src="https://codepen.io/embed/ejemplo-dom" width="100%" height="300"></iframe>',
            'recurso_nombre' => 'guia-dom.pdf',
            'recurso_tipo' => 'pdf'
        ]);

        Subnivel::create([
            'nivel_id' => $nivel2->id,
            'numero' => 2,
            'titulo' => 'Modificar Contenido',
            'descripcion' => 'innerHTML, textContent, classList y manipulación de estilos.',
            'url_iframe' => '<iframe src="https://codepen.io/embed/ejemplo-modificar" width="100%" height="300"></iframe>',
            'recurso_nombre' => 'practica-dom.pdf',
            'recurso_tipo' => 'pdf'
        ]);

        $this->command->info("    📋 2 subniveles creados para nivel 2");
    }
}
