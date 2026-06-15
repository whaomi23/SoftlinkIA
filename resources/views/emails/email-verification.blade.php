<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica tu cuenta - SoftLinkIA</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #0ea5e9, #3b82f6);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .content {
            padding: 40px 30px;
        }
        .content h2 {
            color: #1e293b;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .content p {
            margin-bottom: 20px;
            font-size: 16px;
            color: #64748b;
        }
        .button {
            display: inline-block;
            background: linear-gradient(135deg, #0ea5e9, #3b82f6);
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            margin: 20px 0;
            transition: transform 0.2s;
        }
        .button:hover {
            transform: translateY(-2px);
        }
        .footer {
            background-color: #f8fafc;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }
        .footer p {
            margin: 0;
            font-size: 14px;
            color: #64748b;
        }
        .security-note {
            background-color: #fef3c7;
            border: 1px solid #f59e0b;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
        }
        .security-note p {
            margin: 0;
            color: #92400e;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔐 SoftLinkIA</h1>
        </div>

        <div class="content">
            <h2>¡Hola {{ $user->nombreCompleto }}!</h2>

            <p>Gracias por registrarte en SoftLinkIA. Para completar tu registro y acceder a todos nuestros servicios, necesitas verificar tu dirección de email.</p>

            <p>Haz clic en el botón de abajo para verificar tu cuenta:</p>

            <div style="text-align: center;">
                <a href="{{ $verificationUrl }}" class="button">✅ Verificar mi cuenta</a>
            </div>

            <div class="security-note">
                <p><strong>⚠️ Importante:</strong> Este enlace es válido por 24 horas. Si no verificas tu cuenta en este tiempo, deberás solicitar un nuevo enlace de verificación.</p>
            </div>

            <p>Si el botón no funciona, puedes copiar y pegar este enlace en tu navegador:</p>
            <p style="word-break: break-all; background-color: #f1f5f9; padding: 10px; border-radius: 5px; font-family: monospace; font-size: 14px;">
                {{ $verificationUrl }}
            </p>

            <p>Una vez verificado tu email, podrás:</p>
            <ul>
                <li>✅ Acceder a todos los cursos disponibles</li>
                <li>✅ Participar en la comunidad</li>
                <li>✅ Recibir certificados</li>
                <li>✅ Acceder a contenido exclusivo</li>
            </ul>

            <p>Si no creaste esta cuenta, puedes ignorar este email.</p>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} SoftLinkIA - Todos los derechos reservados</p>
            <p>Este es un email automático, por favor no respondas a este mensaje.</p>
        </div>
    </div>
</body>
</html>