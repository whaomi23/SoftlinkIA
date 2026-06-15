<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KibiContact;

class KibiContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear contactos de prueba
        $contactos = [
            [
                'nombre' => 'María',
                'apellidos' => 'González López',
                'celular' => '+525512345678',
                'email' => 'maria.gonzalez@universidad.edu.mx',
                'institucion' => 'Universidad Nacional',
                'puesto' => 'Directora Académica',
                'ciudad' => 'Ciudad de México',
                'estado' => 'CDMX',
                'whatsapp' => true,
                'email_contact' => true,
                'status' => 'nuevo',
            ],
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Rodríguez Martínez',
                'celular' => '+525598765432',
                'email' => 'carlos.rodriguez@instituto.edu.mx',
                'institucion' => 'Instituto Tecnológico',
                'puesto' => 'Coordinador de Tecnología',
                'ciudad' => 'Guadalajara',
                'estado' => 'Jalisco',
                'whatsapp' => false,
                'email_contact' => true,
                'status' => 'contactado',
            ],
            [
                'nombre' => 'Ana',
                'apellidos' => 'Hernández Silva',
                'celular' => '+525555512345',
                'email' => 'ana.hernandez@colegio.edu.mx',
                'institucion' => 'Colegio Privado',
                'puesto' => 'Subdirectora',
                'ciudad' => 'Monterrey',
                'estado' => 'Nuevo León',
                'whatsapp' => true,
                'email_contact' => false,
                'status' => 'interesado',
            ],
        ];

        foreach ($contactos as $contacto) {
            KibiContact::create($contacto);
        }

        $this->command->info('Contactos de prueba creados exitosamente');
    }
}
