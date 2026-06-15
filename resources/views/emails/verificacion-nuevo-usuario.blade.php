<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a SoftLinkIA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .button {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>¡Bienvenido a SoftLinkIA!</h1>
        <p>Tu plataforma de aprendizaje en línea</p>
    </div>

    <div class="content">
        <h2>Hola {{ $user->name }},</h2>

        <p>¡Gracias por registrarte en SoftLinkIA! Estamos emocionados de tenerte como parte de nuestra comunidad de aprendizaje.</p>

        <p>Para completar tu registro y acceder a todos nuestros cursos y recursos, necesitas verificar tu dirección de email.</p>

        <div style="text-align: center;">
            <a href="{{ $verificationUrl }}" class="button">Verificar mi cuenta</a>
        </div>

        <p>Si el botón no funciona, puedes copiar y pegar este enlace en tu navegador:</p>
        <p style="word-break: break-all; background: #e9e9e9; padding: 10px; border-radius: 5px;">
            {{ $verificationUrl }}
        </p>

        <p><strong>¿Qué puedes hacer después de verificar tu cuenta?</strong></p>
        <ul>
            <li>Acceder a nuestro catálogo completo de cursos</li>
            <li>Participar en comunidades de aprendizaje</li>
            <li>Obtener certificados de finalización</li>
            <li>Conectar con otros estudiantes</li>
        </ul>

        <p>Si no creaste esta cuenta, puedes ignorar este email.</p>
    </div>

    <div class="footer">
        <p>Este es un email automático, por favor no respondas a este mensaje.</p>
        <p>&copy; {{ date('Y') }} SoftLinkIA. Todos los derechos reservados.</p>
    </div>
</body>
</html>
