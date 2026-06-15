<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Token de sesión - SoftLinkIA</title>
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
        .token-box {
            background: #e9e9e9;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            margin: 20px 0;
            font-family: monospace;
            font-size: 18px;
            font-weight: bold;
            color: #333;
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
        <h1>Token de sesión</h1>
        <p>SoftLinkIA</p>
    </div>

    <div class="content">
        <h2>Hola {{ $user->name }},</h2>

        <p>Hemos generado un token de sesión para tu cuenta en SoftLinkIA.</p>

        <p><strong>Tu token de sesión es:</strong></p>
        <div class="token-box">
            {{ $sessionToken }}
        </div>

        <p>Para verificar tu cuenta y activar el token de sesión, haz clic en el botón de abajo:</p>

        <div style="text-align: center;">
            <a href="{{ $verificationUrl }}" class="button">Verificar y activar sesión</a>
        </div>

        <p>Si el botón no funciona, puedes copiar y pegar este enlace en tu navegador:</p>
        <p style="word-break: break-all; background: #e9e9e9; padding: 10px; border-radius: 5px;">
            {{ $verificationUrl }}
        </p>

        <p><strong>Información importante:</strong></p>
        <ul>
            <li>Este token es válido por 24 horas</li>
            <li>Guarda este token en un lugar seguro</li>
            <li>No compartas este token con nadie</li>
            <li>Después de verificar, podrás acceder a tu cuenta</li>
        </ul>

        <p>Si no solicitaste este token, contacta a nuestro equipo de soporte inmediatamente.</p>
    </div>

    <div class="footer">
        <p>Este es un email automático, por favor no respondas a este mensaje.</p>
        <p>&copy; {{ date('Y') }} SoftLinkIA. Todos los derechos reservados.</p>
    </div>
</body>
</html>
