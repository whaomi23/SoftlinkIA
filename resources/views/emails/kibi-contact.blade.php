<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #02AFC9 0%, #6D9F3E 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 16px;
        }
        .content {
            padding: 40px 30px;
        }
        .message {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
            white-space: pre-line;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        .footer-logo {
            margin-bottom: 20px;
        }
        .footer-logo img {
            height: 40px;
            width: auto;
        }
        .contact-info {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 20px;
        }
        .social-links {
            margin-top: 20px;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #02AFC9;
            text-decoration: none;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #02AFC9 0%, #6D9F3E 100%);
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            margin: 20px 0;
        }
        .highlight-box {
            background-color: #e3f2fd;
            border-left: 4px solid #02AFC9;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        .feature {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }
        .feature-icon {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .feature h3 {
            margin: 0 0 10px 0;
            color: #02AFC9;
            font-size: 18px;
        }
        .feature p {
            margin: 0;
            font-size: 14px;
            color: #6c757d;
        }
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            .header, .content, .footer {
                padding: 20px;
            }
            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>KIBI</h1>
            <p>Plataforma Educativa Innovadora</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="message">
                {!! $emailMessage !!}
            </div>

            <!-- Highlight Box -->
            <div class="highlight-box">
                <h3 style="margin-top: 0; color: #02AFC9;">¿Por qué elegir KIBI?</h3>
                <p style="margin-bottom: 0;">KIBI es la plataforma educativa que está transformando la forma en que las instituciones educativas gestionan el aprendizaje, ofreciendo herramientas innovadoras y resultados comprobados.</p>
            </div>

            <!-- Features -->
            <div class="features">
                <div class="feature">
                    <div class="feature-icon">📚</div>
                    <h3>Contenido Interactivo</h3>
                    <p>Material educativo dinámico y personalizado</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">📊</div>
                    <h3>Análisis Avanzado</h3>
                    <p>Reportes detallados del progreso estudiantil</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">🎯</div>
                    <h3>Personalización</h3>
                    <p>Adaptado a las necesidades de cada institución</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">🛠️</div>
                    <h3>Soporte 24/7</h3>
                    <p>Asistencia técnica especializada</p>
                </div>
            </div>

            <!-- CTA Button -->
            <div style="text-align: center;">
                <a href="https://softlinkia.com/kibi" class="cta-button">
                    Descubre más sobre KIBI
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-logo">
                <img src="{{ asset('kibbi-images/kibi-logo.webp') }}" alt="KIBI Logo">
            </div>

            <div class="contact-info">
                <p><strong>SoftLinkIA - KIBI</strong></p>
                <p>Plataforma Educativa Innovadora</p>
                <p>📧 info@softlinkia.com</p>
                <p>🌐 www.softlinkia.com</p>
            </div>

            <div class="social-links">
                <a href="https://facebook.com/softlinkia">Facebook</a>
                <a href="https://twitter.com/softlinkia">Twitter</a>
                <a href="https://linkedin.com/company/softlinkia">LinkedIn</a>
                <a href="https://instagram.com/softlinkia">Instagram</a>
            </div>

            <p style="font-size: 12px; color: #adb5bd; margin-top: 20px;">
                Este email fue enviado desde el sistema de gestión de contactos KIBI.<br>
                Si no desea recibir más comunicaciones, puede responder a este email solicitando la baja.
            </p>
        </div>
    </div>
</body>
</html>
