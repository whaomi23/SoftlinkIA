<!-- Sección Planes de Precios -->
<section id="planes" class="relative py-20 overflow-hidden" style="background-color: #F4C336;">
    <!-- Patrón de fondo decorativo mejorado -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Círculos de fondo animados -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-white/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-white/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-r from-white/10 to-transparent rounded-full blur-3xl"></div>
        
        <!-- Líneas decorativas -->
        <div class="absolute top-0 left-0 w-full h-full opacity-5">
            <div class="absolute top-0 left-1/4 w-px h-full bg-white"></div>
            <div class="absolute top-0 right-1/4 w-px h-full bg-white"></div>
            <div class="absolute top-1/4 left-0 w-full h-px bg-white"></div>
            <div class="absolute bottom-1/4 left-0 w-full h-px bg-white"></div>
        </div>
    </div>

    <style>
        /* Estilos generales mejorados */
        .plan-card {
            position: relative;
            backdrop-filter: blur(20px);
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            will-change: transform;
        }

        .plan-card::after {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: inherit;
            padding: 2px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.3), transparent, rgba(255, 255, 255, 0.3));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .plan-card:hover::after {
            opacity: 1;
        }

        /* Plan Professional - Estilo glassmorphism elegante */
        .professional-card-wrapper {
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.98) 0%, 
                rgba(255, 255, 255, 0.95) 50%,
                rgba(249, 250, 251, 0.98) 100%);
            border: 2px solid rgba(1, 139, 176, 0.15);
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.5) inset,
                0 0 40px rgba(1, 139, 176, 0.1);
        }

        .professional-card-wrapper:hover {
            box-shadow: 
                0 30px 80px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.8) inset,
                0 0 60px rgba(1, 139, 176, 0.2),
                0 0 100px rgba(2, 175, 201, 0.1);
            transform: translateY(-12px);
        }

        .professional-header {
            background: linear-gradient(135deg, 
                #018BB0 0%, 
                #02AFC9 25%,
                #00B8D4 50%,
                #02AFC9 75%,
                #018BB0 100%);
            background-size: 400% 400%;
            animation: gradientShift 12s ease infinite;
            position: relative;
            overflow: hidden;
        }

        .professional-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .professional-badge {
            background: linear-gradient(135deg, #02AFC9, #018BB0, #02AFC9);
            background-size: 200% 200%;
            box-shadow: 
                0 8px 24px rgba(1, 139, 176, 0.4),
                0 0 20px rgba(2, 175, 201, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
            animation: badgeShimmer 3s ease infinite;
            position: relative;
            overflow: hidden;
        }

        .professional-badge::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shine 2s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        @keyframes badgeShimmer {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Plan Ultimate - Estilo ultra premium */
        .ultimate-card-wrapper {
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 1) 0%, 
                rgba(255, 255, 255, 0.98) 50%,
                rgba(250, 250, 255, 1) 100%);
            border: 3px solid transparent;
            background-clip: padding-box;
            position: relative;
            box-shadow: 
                0 25px 70px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.6) inset,
                0 0 50px rgba(244, 195, 54, 0.2);
        }

        .ultimate-card-wrapper:hover {
            box-shadow: 
                0 35px 100px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.9) inset,
                0 0 80px rgba(244, 195, 54, 0.3),
                0 0 120px rgba(1, 139, 176, 0.15);
            transform: translateY(-15px) scale(1.02);
        }

        .ultimate-card-wrapper::before {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 2rem;
            padding: 3px;
            background: linear-gradient(135deg, 
                #F4C336 0%,
                #F8D866 25%,
                #018BB0 50%,
                #02AFC9 75%,
                #F4C336 100%);
            background-size: 400% 400%;
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            animation: borderRotate 8s linear infinite;
            z-index: -1;
        }

        @keyframes borderRotate {
            0% { 
                background-position: 0% 50%;
                filter: hue-rotate(0deg);
            }
            50% { 
                background-position: 100% 50%;
                filter: hue-rotate(180deg);
            }
            100% { 
                background-position: 0% 50%;
                filter: hue-rotate(360deg);
            }
        }

        .ultimate-header {
            background: linear-gradient(135deg, 
                #018BB0 0%, 
                #02AFC9 20%,
                #6D9F3E 40%,
                #F4C336 60%,
                #6D9F3E 80%,
                #02AFC9 100%);
            background-size: 400% 400%;
            animation: ultimateGradient 15s ease infinite;
            position: relative;
            overflow: hidden;
        }

        .ultimate-header::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: sweep 3s infinite;
        }

        @keyframes sweep {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        @keyframes ultimateGradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .ultimate-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle, rgba(255, 255, 255, 0.4) 1px, transparent 1px),
                radial-gradient(circle, rgba(255, 255, 255, 0.2) 1px, transparent 1px);
            background-size: 50px 50px, 100px 100px;
            animation: sparkleMove 25s linear infinite;
        }

        @keyframes sparkleMove {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(50px, 50px) rotate(360deg); }
        }

        .ultimate-badge {
            background: linear-gradient(135deg, 
                #F4C336 0%,
                #F8D866 25%,
                #FFD700 50%,
                #F8D866 75%,
                #F4C336 100%);
            background-size: 300% 300%;
            color: #1a1a1a;
            box-shadow: 
                0 12px 40px rgba(244, 195, 54, 0.5),
                0 0 30px rgba(244, 195, 54, 0.3),
                inset 0 2px 0 rgba(255, 255, 255, 0.5),
                inset 0 -2px 0 rgba(0, 0, 0, 0.1);
            animation: badgePulse 2.5s ease-in-out infinite, badgeGradient 4s ease infinite;
            position: relative;
            overflow: hidden;
        }

        .ultimate-badge::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.5) 50%, transparent 70%);
            animation: badgeShine 2s infinite;
        }

        @keyframes badgeShine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        @keyframes badgeGradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        @keyframes badgePulse {
            0%, 100% { 
                transform: scale(1); 
                box-shadow: 
                    0 12px 40px rgba(244, 195, 54, 0.5),
                    0 0 30px rgba(244, 195, 54, 0.3);
            }
            50% { 
                transform: scale(1.08); 
                box-shadow: 
                    0 18px 60px rgba(244, 195, 54, 0.7),
                    0 0 50px rgba(244, 195, 54, 0.5);
            }
        }

        /* Efectos de hover mejorados */
        .plan-card:hover {
            transform: translateY(-12px);
        }

        .feature-item {
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            padding: 1rem;
            border-radius: 1rem;
            position: relative;
            overflow: hidden;
        }

        .feature-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, transparent, currentColor, transparent);
            transform: scaleY(0);
            transition: transform 0.4s ease;
        }

        .feature-item:hover::before {
            transform: scaleY(1);
        }

        .feature-item:hover {
            background: rgba(1, 139, 176, 0.08);
            transform: translateX(8px) scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        /* Iconos mejorados con efectos */
        .plan-icon {
            filter: drop-shadow(0 15px 30px rgba(0, 0, 0, 0.3));
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            animation: iconFloat 3s ease-in-out infinite;
        }

        @keyframes iconFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
        }

        .plan-card:hover .plan-icon {
            transform: scale(1.15) rotate(10deg) translateY(-5px);
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.4));
        }

        /* Botones mejorados con efectos avanzados */
        .plan-button {
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 
                0 10px 30px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .plan-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            transform: translate(-50%, -50%);
            transition: width 0.8s, height 0.8s;
        }

        .plan-button:hover::before {
            width: 400px;
            height: 400px;
        }

        .plan-button:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 15px 40px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }

        .ultimate-button {
            background: linear-gradient(135deg, 
                #059669 0%,
                #10b981 50%,
                #059669 100%);
            background-size: 200% 200%;
            box-shadow: 
                0 12px 40px rgba(5, 150, 105, 0.4),
                0 0 30px rgba(5, 150, 105, 0.2),
                inset 0 2px 0 rgba(255, 255, 255, 0.4),
                inset 0 -2px 0 rgba(0, 0, 0, 0.1);
            animation: buttonGradient 3s ease infinite;
            color: white;
        }

        @keyframes buttonGradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .ultimate-button:hover {
            background: linear-gradient(135deg, 
                #10b981 0%,
                #059669 50%,
                #10b981 100%);
            box-shadow: 
                0 18px 60px rgba(5, 150, 105, 0.6),
                0 0 50px rgba(5, 150, 105, 0.4),
                inset 0 2px 0 rgba(255, 255, 255, 0.6);
            transform: translateY(-4px) scale(1.02);
        }

        /* Estilos para Atropos - Tarjetas más anchas */
        .my-atropos-professional,
        .my-atropos-ultimate {
            width: 100%;
            min-width: 24rem;
            max-width: 28rem;
            flex: 1 1 0;
        }
        
        @media (max-width: 1024px) {
            .my-atropos-professional,
            .my-atropos-ultimate {
                min-width: 100%;
                max-width: 100%;
            }
        }
        
        /* Asegurar que ambas tarjetas tengan exactamente el mismo ancho */
        .my-atropos-professional .atropos-inner,
        .my-atropos-ultimate .atropos-inner {
            width: 100%;
        }
        
        /* Asegurar que ambas tarjetas tengan exactamente el mismo tamaño */
        .professional-card-wrapper,
        .ultimate-card-wrapper {
            width: 100%;
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .professional-header,
        .ultimate-header {
            flex-shrink: 0;
        }

        .atropos-inner > div:last-child {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }


        /* Animación de entrada mejorada */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .plan-card {
            animation: slideInUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .plan-card:nth-child(2) {
            animation-delay: 0.3s;
            animation-fill-mode: both;
        }

        /* Efectos de glassmorphism adicionales */
        .feature-icon-wrapper {
            position: relative;
            transition: all 0.4s ease;
        }

        .feature-icon-wrapper::after {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            background: linear-gradient(135deg, currentColor, transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        .feature-item:hover .feature-icon-wrapper::after {
            opacity: 0.3;
        }

        .feature-item:hover .feature-icon-wrapper {
            transform: scale(1.15) rotate(5deg);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .my-atropos-professional,
            .my-atropos-ultimate {
                max-width: 100%;
            }
            
            .ultimate-header::before,
            .ultimate-header::after {
                display: none;
            }
        }
    </style>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        <!-- Título principal mejorado -->
        <div class="mb-12">
            <h1 class="text-white text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold uppercase mb-6 drop-shadow-2xl tracking-tight leading-tight" style="font-family: 'Piala', sans-serif; text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);">
                CONOCE NUESTROS PLANES
            </h1>
            <p class="mt-4 text-white text-lg sm:text-xl max-w-2xl mx-auto opacity-95 font-medium" style="font-family: 'Piala', sans-serif; font-style: italic; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);">
                Revisa qué plan se adapta mejor a las necesidades de tu institución
            </p>
        </div>

        <!-- Tarjetas de planes -->
        <div class="flex flex-col lg:flex-row justify-center items-start lg:items-stretch lg:space-x-4 space-y-8 lg:space-y-0 mt-16">
            <!-- Plan Profesional -->
            <div class="flex flex-col items-center w-full lg:flex-1">
            <div class="atropos my-atropos-professional w-full">
                <div class="atropos-scale">
                    <div class="atropos-rotate">
                        <div class="atropos-inner plan-card professional-card-wrapper rounded-3xl overflow-hidden">
                            <!-- Badge superior mejorado -->
                            <div class="absolute top-5 right-5 z-20" data-atropos-offset="15">
                                <div class="professional-badge px-3 py-1.5 rounded-full text-white text-[10px] font-black uppercase tracking-widest">
                                    ✨ POPULAR
                                </div>
                            </div>

                            <!-- Header con gradiente mejorado -->
                            <div class="professional-header p-5 pb-8 pt-10 relative">
                                <!-- Icono del plan -->
                                <div class="flex justify-center mb-4" data-atropos-offset="15">
                                    <img src="/kibbi-images/proffesional.png" alt="Professional Plan Icon" class="w-20 h-20 object-contain plan-icon">
                                </div>
                                
                                <!-- Título del plan -->
                                <h3 class="text-2xl font-bold text-white mb-2 uppercase tracking-tight drop-shadow-lg" style="font-family: 'Piala', sans-serif; text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);" data-atropos-offset="10">
                                    PROFESSIONAL
                                </h3>
                                <p class="text-white/90 text-sm font-medium" style="text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);" data-atropos-offset="7">
                                    Ideal para instituciones medianas
                                </p>
                            </div>

                            <!-- Contenido principal -->
                            <div class="p-5 pt-8">
                                <!-- Características mejoradas -->
                                <div class="space-y-2.5 mb-6">
                                    <div class="feature-item flex items-start space-x-3 bg-gradient-to-r from-emerald-50/50 to-green-50/50 border-l-4 border-emerald-500 rounded-r-xl" data-atropos-offset="5">
                                        <div class="flex-shrink-0 mt-0.5 feature-icon-wrapper">
                                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-green-400 via-emerald-500 to-green-600 flex items-center justify-center shadow-lg">
                                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 pt-0.5">
                                            <span class="text-gray-800 font-bold text-sm">Hasta 25 usuarios</span>
                                        </div>
                                    </div>

                                    <div class="feature-item flex items-start space-x-3 bg-gradient-to-r from-cyan-50/50 to-blue-50/50 border-l-4 border-cyan-500 rounded-r-xl" data-atropos-offset="4">
                                        <div class="flex-shrink-0 mt-0.5 feature-icon-wrapper">
                                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-cyan-400 via-blue-500 to-cyan-600 flex items-center justify-center shadow-lg">
                                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 pt-0.5">
                                            <span class="text-gray-800 font-bold text-sm">100GB de almacenamiento</span>
                                        </div>
                                    </div>

                                    <div class="feature-item flex items-start space-x-3 bg-gradient-to-r from-purple-50/50 to-pink-50/50 border-l-4 border-purple-500 rounded-r-xl" data-atropos-offset="3">
                                        <div class="flex-shrink-0 mt-0.5 feature-icon-wrapper">
                                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-purple-400 via-pink-500 to-purple-600 flex items-center justify-center shadow-lg">
                                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 pt-0.5">
                                            <span class="text-gray-800 font-bold text-sm">Dashboards avanzados</span>
                                        </div>
                                    </div>

                                    <div class="feature-item flex items-start space-x-3 bg-gradient-to-r from-orange-50/50 to-amber-50/50 border-l-4 border-orange-500 rounded-r-xl" data-atropos-offset="2">
                                        <div class="flex-shrink-0 mt-0.5 feature-icon-wrapper">
                                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-orange-400 via-amber-500 to-orange-600 flex items-center justify-center shadow-lg">
                                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 pt-0.5">
                                            <span class="text-gray-800 font-bold text-sm">IA Predictiva</span>
                                        </div>
                                    </div>

                                    <div class="feature-item flex items-start space-x-3 bg-gradient-to-r from-teal-50/50 to-emerald-50/50 border-l-4 border-teal-500 rounded-r-xl" data-atropos-offset="1">
                                        <div class="flex-shrink-0 mt-0.5 feature-icon-wrapper">
                                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-teal-400 via-emerald-500 to-teal-600 flex items-center justify-center shadow-lg">
                                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 pt-0.5">
                                            <span class="text-gray-800 font-bold text-sm">Soporte prioritario</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Botón CTA separado Professional -->
            <button onclick="openContactModal(); return false;" class="plan-button w-full max-w-sm mt-6 py-3.5 bg-gradient-to-r from-[#018BB0] via-[#02AFC9] to-[#018BB0] bg-[length:200%_200%] text-white font-bold rounded-xl hover:from-[#02AFC9] hover:via-[#018BB0] hover:to-[#02AFC9] transition-all duration-500 shadow-xl hover:shadow-2xl relative z-10 uppercase tracking-wide text-sm" style="font-family: 'Piala', sans-serif; animation: buttonGradient 4s ease infinite;">
                <span class="relative z-10 flex items-center justify-center space-x-2">
                    <span>COMENZAR AHORA</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </span>
            </button>
            </div>

            <!-- Plan Ultimate - Premium mejorado -->
            <div class="flex flex-col items-center w-full lg:flex-1">
            <div class="atropos my-atropos-ultimate w-full">
                <div class="atropos-scale">
                    <div class="atropos-rotate">
                        <div class="atropos-inner plan-card ultimate-card-wrapper rounded-3xl relative" style="overflow: visible;">
                            <!-- Badge Premium ultra destacado -->
                            <div class="absolute top-4 left-1/2 transform -translate-x-1/2 z-30" data-atropos-offset="20" style="pointer-events: none;">
                                <div class="ultimate-badge px-3.5 py-1.5 rounded-full text-xs font-black uppercase tracking-wider whitespace-nowrap">
                                    ⭐ MÁS VENDIDO ⭐
                                </div>
                            </div>
                            
                            <!-- Contenedor con overflow para el contenido -->
                            <div class="overflow-hidden rounded-3xl">
                            <!-- Header premium con efectos mejorados -->
                            <div class="ultimate-header p-5 pb-8 pt-10 relative">
                                <!-- Icono del plan -->
                                <div class="flex justify-center mb-4" data-atropos-offset="18">
                                    <img src="/kibbi-images/ultimate.png" alt="Ultimate Plan Icon" class="w-20 h-20 object-contain plan-icon drop-shadow-2xl">
                                </div>
                                
                                <!-- Título del plan con efecto shimmer mejorado -->
                                <h3 class="text-2xl font-bold mb-2 uppercase tracking-tight drop-shadow-2xl" style="font-family: 'Piala', sans-serif; background: linear-gradient(45deg, #fff, #F4C336, #FFD700, #F4C336, #fff); background-size: 300% 300%; -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; animation: titleShimmer 4s ease-in-out infinite; text-shadow: 0 0 30px rgba(244, 195, 54, 0.5);" data-atropos-offset="12">
                                    ULTIMATE
                                </h3>
                                <p class="text-white/90 text-sm font-medium" style="text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);" data-atropos-offset="9">
                                    Solución completa para grandes instituciones
                                </p>
                            </div>

                            <!-- Contenido principal -->
                            <div class="p-5 pt-8">
                                <!-- Características ultra destacadas -->
                                <div class="space-y-2.5 mb-6">
                                    <div class="feature-item flex items-start space-x-3 bg-gradient-to-r from-emerald-100 via-green-100 to-emerald-100 border-l-4 border-emerald-600 p-3 rounded-r-xl shadow-sm" data-atropos-offset="6">
                                        <div class="flex-shrink-0 mt-0.5 feature-icon-wrapper">
                                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-emerald-500 via-green-600 to-emerald-700 flex items-center justify-center shadow-xl">
                                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 pt-0.5">
                                            <span class="text-gray-900 font-black text-sm">Usuarios Ilimitados</span>
                                        </div>
                                    </div>

                                    <div class="feature-item flex items-start space-x-3 bg-gradient-to-r from-blue-100 via-cyan-100 to-blue-100 border-l-4 border-blue-600 p-3 rounded-r-xl shadow-sm" data-atropos-offset="5">
                                        <div class="flex-shrink-0 mt-0.5 feature-icon-wrapper">
                                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-blue-500 via-cyan-600 to-blue-700 flex items-center justify-center shadow-xl">
                                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 pt-0.5">
                                            <span class="text-gray-900 font-black text-sm">1TB de almacenamiento</span>
                                        </div>
                                    </div>

                                    <div class="feature-item flex items-start space-x-3 bg-gradient-to-r from-purple-100 via-pink-100 to-purple-100 border-l-4 border-purple-600 p-3 rounded-r-xl shadow-sm" data-atropos-offset="4">
                                        <div class="flex-shrink-0 mt-0.5 feature-icon-wrapper">
                                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-purple-500 via-pink-600 to-purple-700 flex items-center justify-center shadow-xl">
                                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 pt-0.5">
                                            <span class="text-gray-900 font-black text-sm">Dashboards personalizados</span>
                                        </div>
                                    </div>

                                    <div class="feature-item flex items-start space-x-3 bg-gradient-to-r from-amber-100 via-yellow-100 to-amber-100 border-l-4 border-amber-600 p-3 rounded-r-xl shadow-sm" data-atropos-offset="3">
                                        <div class="flex-shrink-0 mt-0.5 feature-icon-wrapper">
                                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-amber-500 via-yellow-600 to-amber-700 flex items-center justify-center shadow-xl">
                                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 pt-0.5">
                                            <span class="text-gray-900 font-black text-sm">API completa</span>
                                        </div>
                                    </div>

                                    <div class="feature-item flex items-start space-x-3 bg-gradient-to-r from-rose-100 via-red-100 to-rose-100 border-l-4 border-rose-600 p-3 rounded-r-xl shadow-sm" data-atropos-offset="2">
                                        <div class="flex-shrink-0 mt-0.5 feature-icon-wrapper">
                                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-rose-500 via-red-600 to-rose-700 flex items-center justify-center shadow-xl">
                                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 pt-0.5">
                                            <span class="text-gray-900 font-black text-sm">Soporte 24/7 dedicado</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Botón CTA separado Ultimate -->
            <button onclick="openContactModal(); return false;" class="ultimate-button plan-button w-full max-w-sm mt-6 py-4 text-white font-black rounded-xl transition-all duration-500 shadow-2xl hover:shadow-3xl relative z-10 uppercase text-sm tracking-wider" style="font-family: 'Piala', sans-serif;">
                <span class="relative z-10 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    <span>COMENZAR AHORA</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </span>
            </button>
            </div>
        </div>
    </div>
</section>

<!-- Inicializar Atropos para las tarjetas de planes -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Atropos !== 'undefined') {
            // Inicializar Atropos para el plan Professional
            const professionalCard = document.querySelector('.my-atropos-professional');
            if (professionalCard) {
                new Atropos({
                    el: professionalCard,
                    activeOffset: 50,
                    shadowScale: 1.08,
                    rotate: true,
                    rotateTouch: true,
                    rotateXMax: 20,
                    rotateYMax: 20
                });
            }

            // Inicializar Atropos para el plan Ultimate
            const ultimateCard = document.querySelector('.my-atropos-ultimate');
            if (ultimateCard) {
                new Atropos({
                    el: ultimateCard,
                    activeOffset: 60,
                    shadowScale: 1.15,
                    rotate: true,
                    rotateTouch: true,
                    rotateXMax: 25,
                    rotateYMax: 25
                });
            }
        }
    });
</script>
