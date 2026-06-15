<!-- Sección Experiencia KIBI VR -->
<section class="relative py-20 overflow-hidden">
    <!-- Fondo con gradiente difuminado -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#70a241] via-[#b6b33b] to-[#F4C336]"></div>
    
    <!-- Elementos decorativos de fondo -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    <style>
        .video-container {
            position: relative;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .video-container::before {
            content: '';
            position: absolute;
            inset: -8px;
            border-radius: 2rem;
            padding: 2px;
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.3) 0%,
                rgba(255, 255, 255, 0.1) 25%,
                transparent 50%,
                rgba(255, 255, 255, 0.1) 75%,
                rgba(255, 255, 255, 0.3) 100%);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: -1;
        }

        .video-container:hover::before {
            opacity: 1;
        }

        .video-container::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 120%;
            height: 120%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
            z-index: -1;
        }

        .video-container:hover::after {
            opacity: 1;
        }

        .video-wrapper {
            position: relative;
            background: linear-gradient(135deg, 
                rgba(0, 0, 0, 0.95) 0%,
                rgba(0, 0, 0, 0.98) 50%,
                rgba(0, 0, 0, 0.95) 100%);
            box-shadow: 
                0 25px 60px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.1) inset,
                0 0 80px rgba(255, 255, 255, 0.05);
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .video-container:hover .video-wrapper {
            box-shadow: 
                0 35px 80px rgba(0, 0, 0, 0.5),
                0 0 0 2px rgba(255, 255, 255, 0.2) inset,
                0 0 120px rgba(255, 255, 255, 0.1);
            transform: translateY(-8px) scale(1.02);
        }

        .video-decorative-corner {
            position: absolute;
            width: 60px;
            height: 60px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            pointer-events: none;
            transition: all 0.5s ease;
        }

        .video-decorative-corner.top-left {
            top: -15px;
            left: -15px;
            border-right: none;
            border-bottom: none;
            border-top-left-radius: 1rem;
        }

        .video-decorative-corner.top-right {
            top: -15px;
            right: -15px;
            border-left: none;
            border-bottom: none;
            border-top-right-radius: 1rem;
        }

        .video-decorative-corner.bottom-left {
            bottom: -15px;
            left: -15px;
            border-right: none;
            border-top: none;
            border-bottom-left-radius: 1rem;
        }

        .video-decorative-corner.bottom-right {
            bottom: -15px;
            right: -15px;
            border-left: none;
            border-top: none;
            border-bottom-right-radius: 1rem;
        }

        .video-container:hover .video-decorative-corner {
            width: 80px;
            height: 80px;
            border-color: rgba(255, 255, 255, 0.6);
        }

        .video-overlay-label {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 9999px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            z-index: 10;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4);
            }
        }

        .video-play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.4s ease;
            pointer-events: none;
            z-index: 5;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .video-wrapper:hover .video-play-icon {
            opacity: 0.8;
        }

        video {
            transition: all 0.5s ease;
        }

        .video-wrapper:hover video {
            filter: brightness(1.1) contrast(1.05);
        }

        /* Efecto de brillo animado */
        .video-shine {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shine 3s infinite;
            pointer-events: none;
            z-index: 3;
        }

        @keyframes shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }
    </style>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Contenido superior -->
        <div class="text-center mb-16 relative z-20 max-w-5xl mx-auto">
            <div class="space-y-4">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-white uppercase leading-tight" style="font-family: 'Piala', sans-serif; font-style: normal;">
                    TU ESCUELA PODRÍA SER LA PRÓXIMA EN VIVIR LA
                </h2>
                <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold text-white uppercase" style="font-family: 'Piala Outline', sans-serif;">
                    EXPERIENCIA
                </h1>
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-300 uppercase" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    KIBI VR
                </h2>
                
                <!-- Flecha hacia abajo -->
                <div class="flex justify-center mt-8">
                    <svg class="w-8 h-8 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Video Player mejorado -->
        <div class="relative z-20">
            <div class="max-w-5xl mx-auto">
                <div class="video-container">
                    <!-- Esquinas decorativas -->
                    <div class="video-decorative-corner top-left"></div>
                    <div class="video-decorative-corner top-right"></div>
                    <div class="video-decorative-corner bottom-left"></div>
                    <div class="video-decorative-corner bottom-right"></div>

                    <div class="video-wrapper rounded-3xl overflow-hidden">
                        <!-- Label superior -->
                        <div class="video-overlay-label">
                            <span class="text-sm font-bold text-gray-900 flex items-center space-x-2" style="font-family: 'Piala', sans-serif;">
                                <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" fill="currentColor"/>
                                    <path d="M12 8v8m0-4h.01" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                <span>EXPERIENCIA VR</span>
                            </span>
                        </div>

                        <!-- Icono de play overlay -->
                        <div class="video-play-icon">
                            <svg class="w-10 h-10 text-gray-900 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>

                        <!-- Efecto de brillo -->
                        <div class="video-shine"></div>

                        <!-- Video -->
                        <div class="relative aspect-video bg-black">
                            <video
                                class="w-full h-full object-contain"
                                controls
                                preload="metadata"
                                poster="">
                                <source src="/video/KIBI VR.mp4" type="video/mp4">
                                Tu navegador no soporta la reproducción de videos.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
