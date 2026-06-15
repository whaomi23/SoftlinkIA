<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TipoUsuario;
use Illuminate\Support\Facades\Hash;

class MarketingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar o crear el tipo de usuario marketing
        $tipoMarketing = TipoUsuario::firstOrCreate(
            ['nombre' => 'marketing'],
            [
                'nombre' => 'marketing',
                'descripcion' => 'Usuario de marketing con acceso a gestión de contactos',
                'permisos' => json_encode(['contactos' => true, 'dashboard' => true]),
            ]
        );

        // Crear usuario de marketing
        $user = User::firstOrCreate(
            ['email' => 'marketing@softlinkia.test'],
            [
                'name' => 'Usuario Marketing',
                'apellido_paterno' => 'SoftLinkIA',
                'apellido_materno' => 'Marketing',
                'email' => 'marketing@softlinkia.test',
                'password' => Hash::make('marketing123'),
                'tipo_usuario_id' => $tipoMarketing->id,
                'verificado' => true,
                'status' => 'activo',
            ]
        );

        $this->command->info('Usuario de marketing creado: ' . $user->email);
        $this->command->info('Password: marketing123');
    }
}
