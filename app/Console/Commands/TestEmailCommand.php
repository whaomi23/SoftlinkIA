<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email configuration and send a test email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing email configuration...');
        
        // Test data
        $data = [
            'nombre' => 'Test User',
            'compania' => 'Test Company',
            'industria' => 'Tecnología',
            'telefono' => '123456789',
            'email' => 'test@example.com',
            'tipo_consulta' => 'Desarrollo de software',
            'profesionales' => 2,
            'mensaje' => 'Este es un mensaje de prueba para verificar que el sistema de emails funciona correctamente.',
            'tecnologias' => 'Laravel, PHP, JavaScript',
            'donde_encontraste' => 'Google',
            'fecha_envio' => now()->format('d/m/Y H:i:s'),
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Test Agent',
        ];

        try {
            Mail::send('emails.contact-form', $data, function ($message) use ($data) {
                $message->to(config('contact.email_to'), config('contact.company_name'))
                        ->subject('Test Email - Formulario de Contacto')
                        ->replyTo($data['email'], $data['nombre']);
            });
            
            $this->info('✅ Test email sent successfully!');
            $this->info('Check your email: ' . config('contact.email_to'));
            
        } catch (\Exception $e) {
            $this->error('❌ Error sending test email:');
            $this->error($e->getMessage());
            $this->error('Stack trace:');
            $this->error($e->getTraceAsString());
        }
    }
}
