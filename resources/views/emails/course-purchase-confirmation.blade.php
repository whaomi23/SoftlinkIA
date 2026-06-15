<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra - SoftLinkIA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
            position: relative;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #3B82F6, #06B6D4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .success-icon {
            font-size: 48px;
            margin-bottom: 15px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .main-content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 24px;
            font-weight: bold;
            color: #0F172A;
            margin-bottom: 20px;
            text-align: center;
        }

        .message {
            font-size: 16px;
            color: #64748B;
            margin-bottom: 30px;
            text-align: center;
            line-height: 1.8;
        }

        .courses-section {
            background: linear-gradient(135deg, #F8FAFC 0%, #F1F5F9 100%);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            border-left: 4px solid #3B82F6;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            color: #0F172A;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .course-item {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            border: 1px solid #E2E8F0;
            transition: all 0.3s ease;
        }

        .course-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .course-title {
            font-size: 18px;
            font-weight: bold;
            color: #0F172A;
            margin-bottom: 8px;
        }

        .course-price {
            font-size: 16px;
            color: #059669;
            font-weight: bold;
        }

        .order-details {
            background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            border-left: 4px solid #F59E0B;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .detail-row:last-child {
            border-bottom: none;
            font-weight: bold;
            font-size: 18px;
            color: #0F172A;
        }

        .detail-label {
            color: #64748B;
            font-weight: 500;
        }

        .detail-value {
            color: #0F172A;
            font-weight: bold;
        }

        .access-button {
            display: inline-block;
            background: linear-gradient(135deg, #3B82F6 0%, #1D4ED8 100%);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            text-align: center;
            margin: 20px 0;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .access-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }

        .footer {
            background: #0F172A;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        .footer-content {
            margin-bottom: 20px;
        }

        .footer-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .footer-text {
            color: #94A3B8;
            font-size: 14px;
            line-height: 1.6;
        }

        .social-links {
            margin-top: 20px;
        }

        .social-link {
            display: inline-block;
            margin: 0 10px;
            color: #94A3B8;
            text-decoration: none;
            font-size: 14px;
        }

        .social-link:hover {
            color: #3B82F6;
        }

        .stripe-info {
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            font-size: 14px;
            color: #64748B;
        }

        .stripe-logo {
            color: #635BFF;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 8px;
            }

            .main-content {
                padding: 20px 15px;
            }

            .header {
                padding: 20px 15px;
            }

            .courses-section,
            .order-details {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="header-content">
                <div class="logo">SoftLinkIA</div>
                <div class="success-icon">🎓</div>
                <h1 style="font-size: 24px; margin: 0;">¡Compra Exitosa!</h1>
                <p style="margin: 10px 0 0 0; opacity: 0.9;">Tu acceso a los cursos está listo</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="greeting">¡Hola {{ $user->name }}!</div>

            <div class="message">
                ¡Felicitaciones! Tu compra se ha procesado exitosamente.
                Ya tienes acceso completo a todos los cursos que adquiriste.
                ¡Es hora de comenzar tu viaje de aprendizaje!
            </div>

            <!-- Courses Section -->
            <div class="courses-section">
                <div class="section-title">
                    <span>📚</span>
                    Cursos Adquiridos
                </div>

                @foreach($inscripciones as $inscripcion)
                    <div class="course-item">
                        <div class="course-title">{{ $inscripcion->curso->titulo }}</div>
                        <div class="course-price">${{ number_format($inscripcion->monto_pagado, 2) }} MXN</div>
                    </div>
                @endforeach
            </div>

            <!-- Order Details -->
            <div class="order-details">
                <div class="section-title">
                    <span>🧾</span>
                    Detalles de la Orden
                </div>

                <div class="detail-row">
                    <span class="detail-label">Fecha de Compra:</span>
                    <span class="detail-value">{{ $purchaseDate->format('d/m/Y H:i') }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Número de Cursos:</span>
                    <span class="detail-value">{{ $inscripciones->count() }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Total Pagado:</span>
                    <span class="detail-value">${{ number_format($totalAmount, 2) }} MXN</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">ID de Sesión:</span>
                    <span class="detail-value">{{ $stripeSessionId }}</span>
                </div>
            </div>

            <!-- Stripe Info -->
            <div class="stripe-info">
                <strong class="stripe-logo">💳 Procesado por Stripe</strong><br>
                Tu pago fue procesado de forma segura a través de Stripe.
                Puedes encontrar el recibo detallado en tu dashboard de Stripe.
            </div>

            <!-- Access Button -->
            <div style="text-align: center;">
                <a href="{{ route('usuario.cursos.adquiridos') }}" class="access-button">
                    🚀 Acceder a Mis Cursos
                </a>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <p style="color: #64748B; font-size: 14px;">
                    ¿Tienes preguntas? Contáctanos en
                    <a href="mailto:soporte@softlinkia.com" style="color: #3B82F6;">soporte@softlinkia.com</a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <div class="footer-title">SoftLinkIA</div>
                <div class="footer-text">
                    Tu plataforma de aprendizaje en tecnología y desarrollo profesional.
                    <br>Transformando el futuro a través de la educación.
                </div>
            </div>

            <div class="social-links">
                <a href="#" class="social-link">🌐 Web</a>
                <a href="#" class="social-link">📧 Email</a>
                <a href="#" class="social-link">📱 WhatsApp</a>
            </div>
        </div>
    </div>
</body>
</html>
