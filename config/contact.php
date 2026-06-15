<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Configuración del Formulario de Contacto
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar las opciones del formulario de contacto
    |
    */

    // Email de destino para recibir los formularios
    'email_to' => env('CONTACT_EMAIL_TO', 'bh1455587@gmail.com'),
    
    // Email de respuesta (reply-to)
    'email_reply_to' => env('CONTACT_EMAIL_REPLY_TO', 'neritpa@gmail.com'),
    
    // Nombre de la empresa para los emails
    'company_name' => env('CONTACT_COMPANY_NAME', 'SoftLinkIA'),
    
    // Activar/desactivar el envío de emails
    'send_emails' => env('CONTACT_SEND_EMAILS', true),
    
    // Activar/desactivar el logging de formularios
    'log_submissions' => env('CONTACT_LOG_SUBMISSIONS', true),
    
    // Límites de validación
    'limits' => [
        'max_professionals' => 50,
        'min_professionals' => 1,
        'max_message_length' => 2000,
        'max_name_length' => 255,
        'max_company_length' => 255,
    ],
    
    // Tecnologías disponibles para seleccionar
    'available_technologies' => [
        'AWS', 'Azure', 'Docker', 'Jenkins', 'GitLab', 'Java', 'JavaScript',
        'Kubernetes', 'Lambda', 'Laravel', 'Node.js', 'Python', 'React',
        'Terraform', 'Vue.js', 'PHP', 'Django', 'Angular', 'TypeScript',
        'MongoDB', 'PostgreSQL', 'MySQL', 'Redis', 'Elasticsearch'
    ],
    
    // Industrias disponibles
    'available_industries' => [
        'Tecnología',
        'Medios de difusión',
        'Finanzas',
        'Salud',
        'Educación',
        'Retail',
        'Manufactura',
        'Gobierno',
        'Startup',
        'Otro'
    ],
    
    // Tipos de consulta disponibles
    'available_consultation_types' => [
        'Consultoría en la nube',
        'Desarrollo de software',
        'Inteligencia Artificial',
        'Ciberseguridad',
        'DevOps',
        'Migración de datos',
        'Automatización de procesos',
        'Análisis de datos',
        'Desarrollo móvil',
        'Otro'
    ],
];
