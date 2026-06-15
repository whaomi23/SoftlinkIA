@extends('layouts.app')

@section('content')
    <!-- Hero Cookies -->
    <section class="relative min-h-[45vh] flex items-center justify-center overflow-hidden py-14">
        <div class="absolute inset-0">
            <img src="/background-images-pages/cookies-backgroud.jpg" alt="Cookies background"
                class="w-full h-full object-cover object-center opacity-60">
        </div>
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/80 via-purple-900/80 to-fuchsia-900/80"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500/10 via-transparent to-pink-500/10"></div>
        <div class="absolute top-8 left-8 w-64 h-64 bg-indigo-500/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-8 right-8 w-56 h-56 bg-pink-500/20 rounded-full blur-3xl animate-pulse"
            style="animation-delay: .8s"></div>

        <div class="relative z-30 max-w-5xl text-center px-4">
            <div class="inline-flex items-center px-5 py-2 rounded-full bg-white/10 border border-white/20 text-indigo-200 backdrop-blur-sm mb-6"
                data-aos="fade-up">
                <span class="mr-2">🍪</span>
                <span class="font-semibold">Transparencia sobre el uso de cookies</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-4 leading-tight" data-aos="fade-up"
                data-aos-delay="100">
                <span class="bg-gradient-to-r from-white via-indigo-200 to-pink-200 bg-clip-text text-transparent">Política
                    de Cookies</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-200 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Qué son, cómo las usamos y cómo puedes gestionarlas.
            </p>
        </div>
    </section>
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-5xl mx-auto">


            <!-- Contenedor principal con efecto de vidrio -->
            <div class="glass-effect rounded-xl p-6 md:p-8 shadow-xl border-gradient-primary" data-aos="zoom-in"
                data-aos-duration="1000">
                <div class="space-y-8">
                    <!-- Highlights -->
                    <section
                        class="relative rounded-2xl p-6 md:p-8 bg-gradient-to-br from-slate-900/60 to-slate-900/30 border border-white/10 backdrop-blur-md"
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div
                                class="rounded-xl px-4 py-5 bg-white/5 border border-white/10 hover:border-indigo-400/60 transition-all">
                                <div class="mb-3 flex justify-center">
                                    <div class="relative">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-tr from-indigo-500 to-blue-400 rounded-lg opacity-70 blur-sm">
                                        </div>
                                        <div
                                            class="relative w-10 h-10 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 22s8-4 8-10V6l-8-4-8 4v6c0 6 8 10 8 10" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-sm text-slate-400 mb-1 text-center">Esenciales</div>
                                <div class="text-white font-semibold text-center">Funcionamiento básico</div>
                            </div>
                            <div
                                class="rounded-xl px-4 py-5 bg-white/5 border border-white/10 hover:border-blue-400/60 transition-all">
                                <div class="mb-3 flex justify-center">
                                    <div class="relative">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-tr from-blue-500 to-sky-400 rounded-lg opacity-70 blur-sm">
                                        </div>
                                        <div
                                            class="relative w-10 h-10 bg-gradient-to-br from-blue-500 to-sky-400 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 3v18h18" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 17V9M12 21V5M17 17v-7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-sm text-slate-400 mb-1 text-center">Analíticas</div>
                                <div class="text-white font-semibold text-center">Mejorar rendimiento</div>
                            </div>
                            <div
                                class="rounded-xl px-4 py-5 bg-white/5 border border-white/10 hover:border-purple-400/60 transition-all">
                                <div class="mb-3 flex justify-center">
                                    <div class="relative">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-tr from-purple-500 to-indigo-400 rounded-lg opacity-70 blur-sm">
                                        </div>
                                        <div
                                            class="relative w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-400 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l.466 1.43c.129.396.528.645.94.593l1.498-.187c.949-.118 1.401 1.156.673 1.785l-1.13.98a1 1 0 00-.31 1.05l.44 1.46c.285.942-.755 1.686-1.54 1.118l-1.238-.89a1 1 0 00-1.175 0l-1.238.89c-.785.568-1.825-.176-1.54-1.118l.44-1.46a1 1 0 00-.31-1.05l-1.13-.98c-.728-.629-.276-1.903.673-1.785l1.498.187c.412.052.811-.197.94-.593l.466-1.43z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-sm text-slate-400 mb-1 text-center">Funcionales</div>
                                <div class="text-white font-semibold text-center">Experiencia personalizada</div>
                            </div>
                            <div
                                class="rounded-xl px-4 py-5 bg-white/5 border border-white/10 hover:border-pink-400/60 transition-all">
                                <div class="mb-3 flex justify-center">
                                    <div class="relative">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-tr from-pink-500 to-rose-400 rounded-lg opacity-70 blur-sm">
                                        </div>
                                        <div
                                            class="relative w-10 h-10 bg-gradient-to-br from-pink-500 to-rose-400 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="9" stroke-width="2" />
                                                <circle cx="12" cy="12" r="5" stroke-width="2" />
                                                <circle cx="12" cy="12" r="1.5" fill="currentColor" stroke="none" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-sm text-slate-400 mb-1 text-center">Marketing</div>
                                <div class="text-white font-semibold text-center">Anuncios relevantes</div>
                            </div>
                        </div>
                    </section>
                    <!-- Introducción -->
                    <section
                        class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="200">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-cyan-300 transition-colors duration-300">
                                    ¿Qué son las Cookies?</h2>
                            </div>
                            <p class="text-slate-300 leading-relaxed ml-0">Las cookies son pequeños archivos de texto que se
                                almacenan en su dispositivo cuando visita un sitio web. Se utilizan ampliamente para hacer
                                que los sitios web funcionen de manera más eficiente, así como para proporcionar información
                                a los propietarios del sitio.</p>
                        </div>
                    </section>

                    <!-- Tipos de Cookies -->
                    <section
                        class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="300">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-indigo-500/10 to-pink-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-purple-300 transition-colors duration-300">
                                    Tipos de Cookies que Utilizamos</h2>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="relative group">
                                <div
                                    class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-300">
                                </div>
                                <div class="relative bg-gray-900 p-5 rounded-lg h-full">
                                    <div class="flex items-center mb-3">
                                        <div class="service-icon-container">
                                            <div
                                                class="service-icon-glow bg-indigo-500/30 rounded-full group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="service-icon-box bg-gradient-to-br from-indigo-500 to-blue-600 rounded-full transform group-hover:rotate-12 transition-transform duration-500 relative">
                                                <span class="text-2xl">🍪</span>
                                            </div>
                                        </div>
                                        <h3 class="ml-3 text-xl font-semibold text-white">Cookies Esenciales</h3>
                                    </div>
                                    <p class="text-slate-300">Estas cookies son necesarias para que el sitio web funcione y
                                        no se pueden desactivar en nuestros sistemas. Generalmente solo se establecen en
                                        respuesta a acciones realizadas por usted que equivalen a una solicitud de
                                        servicios.</p>
                                </div>
                            </div>

                            <div class="relative group">
                                <div
                                    class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-teal-500 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-300">
                                </div>
                                <div class="relative bg-gray-900 p-5 rounded-lg h-full">
                                    <div class="flex items-center mb-3">
                                        <div class="service-icon-container">
                                            <div
                                                class="service-icon-glow bg-blue-500/30 rounded-full group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="service-icon-box bg-gradient-to-br from-blue-500 to-teal-600 rounded-full transform group-hover:rotate-12 transition-transform duration-500 relative">
                                                <span class="text-2xl">🍪</span>
                                            </div>
                                        </div>
                                        <h3 class="ml-3 text-xl font-semibold text-white">Cookies Analíticas</h3>
                                    </div>
                                    <p class="text-slate-300">Estas cookies nos permiten contar visitas y fuentes de tráfico
                                        para que podamos medir y mejorar el rendimiento de nuestro sitio. Nos ayudan a saber
                                        qué páginas son las más y menos populares.</p>
                                </div>
                            </div>

                            <div class="relative group">
                                <div
                                    class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-300">
                                </div>
                                <div class="relative bg-gray-900 p-5 rounded-lg h-full">
                                    <div class="flex items-center mb-3">
                                        <div class="service-icon-container">
                                            <div
                                                class="service-icon-glow bg-purple-500/30 rounded-full group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="service-icon-box bg-gradient-to-br from-purple-500 to-pink-600 rounded-full transform group-hover:rotate-12 transition-transform duration-500 relative">
                                                <span class="text-2xl">🍪</span>
                                            </div>
                                        </div>
                                        <h3 class="ml-3 text-xl font-semibold text-white">Cookies de Funcionalidad</h3>
                                    </div>
                                    <p class="text-slate-300">Estas cookies permiten que el sitio proporcione una
                                        funcionalidad y personalización mejoradas. Pueden ser establecidas por nosotros o
                                        por proveedores externos cuyos servicios hemos agregado a nuestras páginas.</p>
                                </div>
                            </div>

                            <div class="relative group">
                                <div
                                    class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-300">
                                </div>
                                <div class="relative bg-gray-900 p-5 rounded-lg h-full">
                                    <div class="flex items-center mb-3">
                                        <div class="service-icon-container">
                                            <div
                                                class="service-icon-glow bg-green-500/30 rounded-full group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="service-icon-box bg-gradient-to-br from-green-500 to-teal-600 rounded-full transform group-hover:rotate-12 transition-transform duration-500 relative">
                                                <span class="text-2xl">🍪</span>
                                            </div>
                                        </div>
                                        <h3 class="ml-3 text-xl font-semibold text-white">Cookies de Marketing</h3>
                                    </div>
                                    <p class="text-slate-300">Estas cookies pueden ser establecidas a través de nuestro
                                        sitio por nuestros socios publicitarios. Pueden ser utilizadas por esas empresas
                                        para construir un perfil de sus intereses y mostrarle anuncios relevantes en otros
                                        sitios.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Cómo Gestionar las Cookies -->
                    <section
                        class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="400">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-emerald-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6h4m-7 8h10M5 10h14"></path>
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-green-300 transition-colors duration-300">
                                    Cómo Gestionar las Cookies</h2>
                            </div>
                        </div>

                        <div
                            class="bg-gradient-to-br from-gray-800/30 to-gray-900/30 p-6 rounded-lg border-l-4 border-blue-500 mb-6">
                            <p class="text-slate-300 leading-relaxed">La mayoría de los navegadores web permiten cierto
                                control de la mayoría de las cookies a través de la configuración del navegador. Para saber
                                más sobre las cookies, incluyendo cómo ver qué cookies se han establecido y cómo
                                gestionarlas y eliminarlas, visite <a href="#"
                                    class="text-indigo-400 hover:text-indigo-300 transition-colors duration-300">www.aboutcookies.org</a>
                                o <a href="#"
                                    class="text-indigo-400 hover:text-indigo-300 transition-colors duration-300">www.allaboutcookies.org</a>.
                            </p>
                        </div>

                        <div class="grid md:grid-cols-3 gap-4">
                            <div class="bg-gray-800/50 p-4 rounded-lg hover:bg-gray-800/80 transition-all duration-300">
                                <div class="flex items-center justify-center mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="chrome"
                                        class="w-12 h-12">
                                        <path fill="#00ac47"
                                            d="M4.7434,22.505A12.9769,12.9769,0,0,0,14.88,28.949l5.8848-10.1927L16,16.0058,11.2385,18.755l-1.5875-2.75L8.4885,13.9919,5.3553,8.5649A12.9894,12.9894,0,0,0,4.7434,22.505Z">
                                        </path>
                                        <path fill="#ea4435"
                                            d="M16,3.0072A12.9769,12.9769,0,0,0,5.3507,8.5636l5.8848,10.1927L16,16.0057V10.5072H27.766A12.99,12.99,0,0,0,16,3.0072Z">
                                        </path>
                                        <path fill="#ffba00"
                                            d="M27.2557,22.505a12.9772,12.9772,0,0,0,.5124-12H15.9986v5.5011l4.7619,2.7492-1.5875,2.75-1.1625,2.0135-3.1333,5.4269A12.99,12.99,0,0,0,27.2557,22.505Z">
                                        </path>
                                        <circle cx="15.999" cy="16.007" r="5.5" fill="#fff"></circle>
                                        <circle cx="15.999" cy="16.007" r="4.25" fill="#4285f4"></circle>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white text-center mb-2">Google Chrome</h3>
                                <p class="text-slate-300 text-sm text-center">Configuración > Privacidad y seguridad >
                                    Cookies y otros datos del sitio</p>
                            </div>

                            <div class="bg-gray-800/50 p-4 rounded-lg hover:bg-gray-800/80 transition-all duration-300">
                                <div class="flex items-center justify-center mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-label="Firefox" viewBox="0 0 512 512"
                                        id="firefox" class="w-12 h-12">
                                        <rect width="512" height="512" fill="#fff" rx="15%"></rect>
                                        <linearGradient id="firefox-a" x1=".7" x2=".3" y2=".8">
                                            <stop offset=".3" stop-color="#fd5"></stop>
                                            <stop offset=".6" stop-color="#f85"></stop>
                                            <stop offset="1" stop-color="#d06"></stop>
                                        </linearGradient>
                                        <radialGradient id="firefox-b" cx=".4" cy=".7">
                                            <stop offset=".4" stop-color="#74d"></stop>
                                            <stop offset="1" stop-color="#a2d"></stop>
                                        </radialGradient>
                                        <linearGradient id="firefox-c" x1=".8" x2=".4" y1=".2" y2=".8">
                                            <stop offset=".2" stop-color="#fd5"></stop>
                                            <stop offset="1" stop-color="#f33"></stop>
                                        </linearGradient>
                                        <g transform="scale(4)">
                                            <path fill="url(#firefox-a)"
                                                d="M48 49s-3-9-1-16c-9 2-33 35-33 35a51 48 0 1087-32s5 9 5 15c-3-9-20-25-26-37-24 13-16 39-16 39">
                                            </path>
                                            <circle cx="64" cy="67" r="26" fill="url(#firefox-b)"></circle>
                                            <path fill="url(#firefox-a)"
                                                d="M21 45l43 12c-6 11-16 3-23 14a22 22 0 1034-20s33 3 17 42H28m36 25h1">
                                            </path>
                                            <path fill="url(#firefox-c)"
                                                d="M35 43c16 0 12 7 29 14-18 6-23-9-38 0 5 9 12 8 12 8 1 43 72 29 67-17a50 46.6 47 01-88 33c-9-18-1-40 16-51">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white text-center mb-2">Mozilla Firefox</h3>
                                <p class="text-slate-300 text-sm text-center">Opciones > Privacidad & Seguridad > Cookies y
                                    datos del sitio</p>
                            </div>

                            <div class="bg-gray-800/50 p-4 rounded-lg hover:bg-gray-800/80 transition-all duration-300">
                                <div class="flex items-center justify-center mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-label="Edge" viewBox="0 0 512 512"
                                        id="edge" class="w-12 h-12">
                                        <rect width="512" height="512" fill="#fff" rx="15%"></rect>
                                        <radialGradient id="a" cx=".6" cy=".5">
                                            <stop offset=".8" stop-color="#148"></stop>
                                            <stop offset="1" stop-color="#137"></stop>
                                        </radialGradient>
                                        <radialGradient id="b" cx=".5" cy=".6" fx=".2" fy=".6">
                                            <stop offset=".8" stop-color="#38c"></stop>
                                            <stop offset="1" stop-color="#269"></stop>
                                        </radialGradient>
                                        <linearGradient id="c" y1=".5" y2="1">
                                            <stop offset=".1" stop-color="#5ad"></stop>
                                            <stop offset=".6" stop-color="#5c8"></stop>
                                            <stop offset=".8" stop-color="#7d5"></stop>
                                        </linearGradient>
                                        <path fill="url(#a)"
                                            d="M439 374c-50 77-131 98-163 96-191-9-162-262-47-261-82 52 30 224 195 157 17-12 20 3 15 8">
                                        </path>
                                        <path fill="url(#b)"
                                            d="M311 255c18-82-31-135-129-135S38 212 38 259c0 124 125 253 287 203-134 39-214-116-146-210 46-66 123-68 132 3 M411 99h1">
                                        </path>
                                        <path fill="url(#c)"
                                            d="M39 253C51-15 419-30 472 202c14 107-86 149-166 115-42-26 26-20-3-99-48-112-251-103-264 35">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white text-center mb-2">Microsoft Edge</h3>
                                <p class="text-slate-300 text-sm text-center">Configuración > Cookies y permisos del sitio >
                                    Administrar y eliminar cookies</p>
                            </div>
                        </div>
                    </section>

                    <!-- Nuestras Cookies -->
                    <section
                        class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="500">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-blue-500/10 to-violet-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-violet-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-indigo-500 to-violet-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-indigo-300 transition-colors duration-300">
                                    Nuestras Cookies</h2>
                            </div>
                        </div>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- session -->
                            <div
                                class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-6 cursor-pointer transition-all duration-300">
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-blue-500/10 to-violet-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                                </div>
                                <div class="relative z-10">
                                    <div class="flex items-center mb-3 select-none">
                                        <div class="relative mr-3">
                                            <div
                                                class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-violet-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="relative w-12 h-12 bg-gradient-to-br from-indigo-500 to-violet-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 22s8-4 8-10V6l-8-4-8 4v6c0 6 8 10 8 10" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h3 class="text-white font-bold">session</h3>
                                    </div>
                                    <p class="text-slate-300 text-sm mb-3">Mantiene el estado de la sesión del usuario.</p>
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="px-2 py-1 rounded-md text-xs bg-white/10 border border-white/10 text-slate-200">2
                                            horas</span>
                                        <span
                                            class="px-2 py-1 rounded-md text-xs bg-indigo-500/20 text-indigo-300 border border-indigo-400/30">Esencial</span>
                                    </div>
                                </div>
                                <div class="absolute bottom-2 right-2 w-24 h-24 bg-indigo-400/10 rounded-full blur-2xl">
                                </div>
                            </div>

                            <!-- xsrf-token -->
                            <div
                                class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-6 cursor-pointer transition-all duration-300">
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-blue-500/10 to-violet-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                                </div>
                                <div class="relative z-10">
                                    <div class="flex items-center mb-3 select-none">
                                        <div class="relative mr-3">
                                            <div
                                                class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-violet-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="relative w-12 h-12 bg-gradient-to-br from-indigo-500 to-violet-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 11.5l2.5 2.5L20 8.5" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 12v6a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2h10" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h3 class="text-white font-bold">xsrf-token</h3>
                                    </div>
                                    <p class="text-slate-300 text-sm mb-3">Ayuda a proteger contra ataques CSRF.</p>
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="px-2 py-1 rounded-md text-xs bg-white/10 border border-white/10 text-slate-200">2
                                            horas</span>
                                        <span
                                            class="px-2 py-1 rounded-md text-xs bg-indigo-500/20 text-indigo-300 border border-indigo-400/30">Esencial</span>
                                    </div>
                                </div>
                                <div class="absolute bottom-2 right-2 w-24 h-24 bg-indigo-400/10 rounded-full blur-2xl">
                                </div>
                            </div>

                            <!-- _ga -->
                            <div
                                class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-6 cursor-pointer transition-all duration-300">
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                                </div>
                                <div class="relative z-10">
                                    <div class="flex items-center mb-3 select-none">
                                        <div class="relative mr-3">
                                            <div
                                                class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="relative w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 3v18h18" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 17V9M12 21V5M17 17v-7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h3 class="text-white font-bold">_ga</h3>
                                    </div>
                                    <p class="text-slate-300 text-sm mb-3">Registra un ID único para generar datos
                                        estadísticos.</p>
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="px-2 py-1 rounded-md text-xs bg-white/10 border border-white/10 text-slate-200">2
                                            años</span>
                                        <span
                                            class="px-2 py-1 rounded-md text-xs bg-blue-500/20 text-blue-300 border border-blue-400/30">Analítica</span>
                                    </div>
                                </div>
                                <div class="absolute bottom-2 right-2 w-24 h-24 bg-cyan-400/10 rounded-full blur-2xl"></div>
                            </div>

                            <!-- _gid -->
                            <div
                                class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-6 cursor-pointer transition-all duration-300">
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                                </div>
                                <div class="relative z-10">
                                    <div class="flex items-center mb-3 select-none">
                                        <div class="relative mr-3">
                                            <div
                                                class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="relative w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 3v18h18" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 17V9M12 21V5M17 17v-7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h3 class="text-white font-bold">_gid</h3>
                                    </div>
                                    <p class="text-slate-300 text-sm mb-3">Registra un ID único para generar datos
                                        estadísticos.</p>
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="px-2 py-1 rounded-md text-xs bg-white/10 border border-white/10 text-slate-200">24
                                            horas</span>
                                        <span
                                            class="px-2 py-1 rounded-md text-xs bg-blue-500/20 text-blue-300 border border-blue-400/30">Analítica</span>
                                    </div>
                                </div>
                                <div class="absolute bottom-2 right-2 w-24 h-24 bg-cyan-400/10 rounded-full blur-2xl"></div>
                            </div>

                            <!-- theme_preference -->
                            <div
                                class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-6 cursor-pointer transition-all duration-300">
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-indigo-500/10 to-pink-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                                </div>
                                <div class="relative z-10">
                                    <div class="flex items-center mb-3 select-none">
                                        <div class="relative mr-3">
                                            <div
                                                class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="relative w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9.75 3a.75.75 0 00-.75.75V6H7.5a.75.75 0 000 1.5h1.5v1.5a.75.75 0 001.5 0V7.5H12a.75.75 0 000-1.5h-1.5V3.75A.75.75 0 009.75 3z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4.5 12a7.5 7.5 0 1015 0 7.5 7.5 0 00-15 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h3 class="text-white font-bold">theme_preference</h3>
                                    </div>
                                    <p class="text-slate-300 text-sm mb-3">Almacena la preferencia de tema del usuario.</p>
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="px-2 py-1 rounded-md text-xs bg-white/10 border border-white/10 text-slate-200">1
                                            año</span>
                                        <span
                                            class="px-2 py-1 rounded-md text-xs bg-purple-500/20 text-purple-300 border border-purple-400/30">Funcionalidad</span>
                                    </div>
                                </div>
                                <div class="absolute bottom-2 right-2 w-24 h-24 bg-purple-400/10 rounded-full blur-2xl">
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Cambios a esta política -->
                    <section
                        class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="600">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-amber-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-orange-500 to-amber-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-orange-500 to-amber-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-orange-300 transition-colors duration-300">
                                    Cambios a esta Política</h2>
                            </div>
                            <p class="text-slate-300 leading-relaxed ml-0">Podemos actualizar nuestra Política de Cookies
                                periódicamente. Le notificaremos cualquier cambio publicando la nueva Política de Cookies en
                                esta página. Le recomendamos que revise esta Política de Cookies periódicamente para
                                cualquier cambio.</p>
                        </div>
                    </section>


                </div>
            </div>


        </div>
    </div>

    <!-- Estilos adicionales específicos para esta página -->
    <style>
        .card-hover-effect {
            background: linear-gradient(to bottom right, rgba(30, 41, 59, 0.5), rgba(15, 23, 42, 0.5));
            border: 1px solid rgba(71, 85, 105, 0.2);
            transition: all 0.3s ease;
        }

        .card-hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(124, 58, 237, 0.3);
            border-color: rgba(139, 92, 246, 0.5);
            background: linear-gradient(to bottom right, rgba(30, 41, 59, 0.7), rgba(15, 23, 42, 0.7));
        }

        /* Animación hover para iconos de encabezado en service-card-modern */
        .service-card-modern:hover .relative.mr-4 .relative.w-14.h-14 {
            animation: pulseAndRotate 1.5s infinite alternate;
        }

        @keyframes pulseAndRotate {
            0% {
                transform: rotate(0deg) scale(1);
            }

            100% {
                transform: rotate(12deg) scale(1.1);
            }
        }
    </style>
@endsection