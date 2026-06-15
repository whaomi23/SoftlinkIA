@extends('layouts.app')

@section('content')
    <!-- Hero Términos -->
    <section class="relative min-h-[45vh] flex items-center justify-center overflow-hidden py-14">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 via-purple-900 to-fuchsia-900"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500/10 via-transparent to-pink-500/10"></div>
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('/background-images-pages/terminos-bakcground.png')"></div>
        <div class="absolute top-8 left-8 w-64 h-64 bg-indigo-500/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-8 right-8 w-56 h-56 bg-pink-500/20 rounded-full blur-3xl animate-pulse"
            style="animation-delay: .8s"></div>

        <div class="relative z-30 max-w-5xl text-center px-4">
            <div class="inline-flex items-center px-5 py-2 rounded-full bg-white/10 border border-white/20 text-indigo-200 backdrop-blur-sm mb-6"
                data-aos="fade-up">
                <span class="mr-2">📜</span>
                <span class="font-semibold">Condiciones claras y justas</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-4 leading-tight" data-aos="fade-up"
                data-aos-delay="100">
                <span class="bg-gradient-to-r from-white via-indigo-200 to-pink-200 bg-clip-text text-transparent">Términos
                    de Servicio</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-200 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Lo que aceptas al usar SoftlinkIA y cómo protegemos nuestra relación.
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
                                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-sm text-slate-400 mb-1 text-center">Claridad</div>
                                <div class="text-white font-semibold text-center">Condiciones simples</div>
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
                                                    d="M12 22s8-4 8-10V6l-8-4-8 4v6c0 6 8 10 8 10" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-sm text-slate-400 mb-1 text-center">Seguridad</div>
                                <div class="text-white font-semibold text-center">Protección de datos</div>
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
                                <div class="text-sm text-slate-400 mb-1 text-center">Cumplimiento</div>
                                <div class="text-white font-semibold text-center">Leyes aplicables</div>
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
                                <div class="text-sm text-slate-400 mb-1 text-center">Transparencia</div>
                                <div class="text-white font-semibold text-center">Cambios con aviso</div>
                            </div>
                        </div>
                    </section>
                    <!-- Introducción -->
                    <section
                        class="service-card-modern group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="200">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <h2 class="text-2xl font-bold mb-4 text-gradient-secondary">Introducción</h2>
                        <div class="mb-3 flex justify-center">
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-tr from-blue-500 to-indigo-400 rounded-lg opacity-70 blur-sm">
                                </div>
                                <div
                                    class="relative w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-400 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-slate-300 leading-relaxed">Bienvenido a SoftlinkIA. Al acceder o utilizar nuestro
                            sitio web y servicios, usted acepta estar sujeto a estos Términos de Servicio. Por favor, léalos
                            cuidadosamente.</p>
                    </section>

                    <!-- Uso del Servicio -->
                    <section
                        class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="300">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <h2 class="text-2xl font-bold mb-4 text-gradient-secondary text-center">Uso del Servicio</h2>

                        <div class="relative overflow-hidden rounded-lg mb-6">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg blur opacity-25">
                            </div>
                            <div class="relative bg-gray-900 p-5 rounded-lg">
                                <div class="flex items-center mb-3">
                                    <div class="service-icon-container">
                                        <div class="service-icon-glow bg-blue-500/30 rounded-full"></div>
                                        <div
                                            class="service-icon-box bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full">
                                            <svg class="service-icon-svg" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5.121 17.804A4 4 0 019 16h6a4 4 0 013.879 1.804" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h3 class="ml-3 text-xl font-semibold text-white">Elegibilidad</h3>
                                </div>
                                <p class="text-slate-300">Para utilizar nuestros servicios, debe tener al menos 18 años o la
                                    mayoría de edad legal en su jurisdicción, lo que sea mayor. Al utilizar nuestros
                                    servicios, usted declara y garantiza que tiene la capacidad legal para celebrar un
                                    contrato vinculante.</p>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div
                                class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 p-5 rounded-lg border border-gray-700 hover:border-indigo-500 transition-all duration-300">
                                <div class="flex items-center mb-3">
                                    <div class="mb-3 flex justify-center">
                                        <div class="relative">
                                            <div
                                                class="absolute -inset-1 bg-gradient-to-tr from-indigo-500 to-blue-400 rounded-lg opacity-70 blur-sm">
                                            </div>
                                            <div
                                                class="relative w-10 h-10 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="ml-3 text-xl font-semibold text-white">Cuenta de Usuario</h3>
                                </div>
                                <p class="text-slate-300">Algunas funciones de nuestros servicios pueden requerir que cree
                                    una cuenta. Usted es responsable de mantener la confidencialidad de su cuenta y
                                    contraseña.</p>
                            </div>



                            <div
                                class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 p-5 rounded-lg border border-gray-700 hover:border-indigo-500 transition-all duration-300">
                                <div class="flex items-center mb-3">
                                    <div class="service-icon-container">
                                        <div class="service-icon-glow bg-purple-500/30 rounded-full"></div>
                                        <div
                                            class="service-icon-box bg-gradient-to-br from-purple-500 to-pink-600 rounded-full">
                                        </div>
                                    </div>
                                    <div class="mb-3 flex justify-center">
                                        <div class="relative">
                                            <div
                                                class="absolute -inset-1 bg-gradient-to-tr from-indigo-500 to-blue-400 rounded-lg opacity-70 blur-sm">
                                            </div>
                                            <div
                                                class="relative w-10 h-10 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-lg flex items-center justify-center">
                                                <svg class="service-icon-sv w-5 h-5 text-white" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2">
                                                    <circle cx="12" cy="12" r="10" stroke="currentColor" />
                                                    <line x1="6" y1="6" x2="18" y2="18" stroke="currentColor" />
                                                </svg>

                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="ml-3 text-xl font-semibold text-white">Conducta Prohibida</h3>
                                </div>
                                <p class="text-slate-300">No debe utilizar nuestros servicios para ningún propósito ilegal o
                                    no autorizado, ni violar ninguna ley en su jurisdicción.</p>
                            </div>
                        </div>
                    </section>








                    <section
                        class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="400">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-indigo-500/10 to-pink-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <h2 class="text-2xl font-bold mb-4 text-gradient-secondary text-center">Propiedad Intelectual</h2>




                        <div class="flex items-center mb-3">
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-tr from-purple-500 to-pink-400 rounded-lg opacity-70 blur-sm">
                                </div>
                                <div
                                    class="relative w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-400 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="ml-3 text-xl font-semibold text-white">Derechos de Autor</h3>
                        </div>
                        <p class="text-slate-300 mb-6">Nuestro servicio y su contenido original, características y
                            funcionalidad son y seguirán siendo propiedad exclusiva de SoftlinkIA y sus licenciantes. El
                            servicio está protegido por derechos de autor, marcas comerciales y otras leyes.</p>

                        <div class="grid md:grid-cols-2 gap-5">

                            <div
                                class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 p-5 rounded-lg border border-gray-700 hover:border-indigo-500 transition-all duration-300">
                                <div class="flex items-center mb-3">
                                    <div class="mb-3 flex justify-center">
                                        <div class="relative">
                                            <div
                                                class="absolute -inset-1 bg-gradient-to-tr from-indigo-500 to-blue-400 rounded-lg opacity-70 blur-sm">
                                            </div>
                                            <div
                                                class="relative w-10 h-10 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-lg flex items-center justify-center">
                                                <!-- Ícono de licencia/documento -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6M4 7h16M4 3h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="ml-3 text-xl font-semibold text-white">Licencia de Usuario</h3>
                                </div>
                                <p class="text-slate-300">Le otorgamos una licencia limitada, no exclusiva, no transferible
                                    y revocable para usar nuestros servicios para sus fines personales y no comerciales.</p>
                            </div>


                            <div
                                class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 p-5 rounded-lg border border-gray-700 hover:border-indigo-500 transition-all duration-300">
                                <div class="flex items-center mb-3">
                                    <div class="mb-3 flex justify-center">
                                        <div class="relative">
                                            <div
                                                class="absolute -inset-1 bg-gradient-to-tr from-indigo-500 to-blue-400 rounded-lg opacity-70 blur-sm">
                                            </div>
                                            <div
                                                class="relative w-10 h-10 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="ml-3 text-xl font-semibold text-white">Contenido del Usuario</h3>
                                </div>
                                <p class="text-slate-300">Al proporcionar contenido a nuestros servicios, nos otorga una
                                    licencia mundial, no exclusiva, libre de regalías para usar, reproducir y distribuir
                                    dicho contenido.</p>
                            </div>





                        </div>
                    </section>

                    <!-- Limitación de Responsabilidad -->
                    <section
                        class="service-card-modern service-card-red group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="500">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-red-600/20 via-orange-500/10 to-pink-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <h2 class="text-2xl font-bold mb-4 text-gradient-secondary text-center">Limitación de
                            Responsabilidad</h2>
                        <div class="mb-3 flex justify-center">
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-red-600/30 to-orange-600/30 rounded-lg blur opacity-25">
                                </div>
                                <div class="relative bg-gray-900 p-5 rounded-lg">
                                    <div class="flex items-center mb-3">
                                        <div
                                            class="relative w-10 h-10 bg-gradient-to-br from-red-500 to-orange-400 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                                </path>
                                            </svg>
                                        </div>
                                        <h3 class="ml-3 text-xl font-semibold text-white">Aviso de Responsabilidad</h3>
                                    </div>

                                    <p class="text-slate-300 leading-relaxed">En ningún caso SoftlinkIA, sus directores,
                                        empleados, socios, agentes, proveedores o afiliados serán responsables por cualquier
                                        daño indirecto, incidental, especial, consecuente o punitivo, incluyendo, sin
                                        limitación, pérdida de beneficios, datos, uso, buena voluntad u otras pérdidas
                                        intangibles.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Indemnización -->
                    <section
                        class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="600">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-emerald-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <h2 class="text-2xl font-bold mb-4 text-gradient-secondary text-center">Indemnización</h2>
                        <div class="mb-3 flex items-center">
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-lg opacity-70 blur-sm">
                                </div>
                                <div
                                    class="relative w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-400 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <span class="ml-3 font-medium text-emerald-400">Protección Legal</span>
                        </div>
                        <p class="text-slate-300 leading-relaxed">Usted acepta defender, indemnizar y mantener indemne a
                            SoftlinkIA y sus licenciantes, proveedores de servicios, empleados, agentes, funcionarios y
                            directores de cualquier reclamo, responsabilidad, daño, juicio, premio, pérdida, costo, gasto o
                            tarifa (incluidos los honorarios razonables de abogados) que surjan de o estén relacionados con
                            su uso del servicio.</p>
                    </section>

                    <!-- Terminación -->
                    <section
                        class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="700">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-blue-500/10 to-violet-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <h2 class="text-2xl font-bold mb-4 text-gradient-secondary text-center">Terminación</h2>
                        <div class="mb-3 flex items-center">
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-tr from-indigo-500 to-violet-400 rounded-lg opacity-70 blur-sm">
                                </div>
                                <div
                                    class="relative w-10 h-10 bg-gradient-to-br from-indigo-500 to-violet-400 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </div>
                            </div>
                            <span class="ml-3 font-medium text-violet-400">Fin de Servicio</span>
                        </div>
                        <div
                            class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 p-5 rounded-lg border border-gray-700">
                            <p class="text-slate-300 leading-relaxed mb-4">Podemos terminar o suspender su acceso
                                inmediatamente, sin previo aviso ni responsabilidad, por cualquier motivo, incluyendo, sin
                                limitación, si usted incumple estos Términos de Servicio.</p>

                            <p class="text-slate-300 leading-relaxed">Todas las disposiciones de los Términos que, por su
                                naturaleza, deberían sobrevivir a la terminación, sobrevivirán a la terminación, incluyendo,
                                sin limitación, disposiciones de propiedad, renuncias de garantía, indemnización y
                                limitaciones de responsabilidad.</p>
                        </div>
                    </section>

                    <!-- Cambios a los Términos -->
                    <section
                        class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="800">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-amber-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>
                        <h2 class="text-2xl font-bold mb-4 text-gradient-secondary text-center">Cambios a los Términos</h2>
                        <div class="mb-3 flex items-center">
                            <div class="relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-tr from-orange-500 to-amber-400 rounded-lg opacity-70 blur-sm">
                                </div>
                                <div
                                    class="relative w-10 h-10 bg-gradient-to-br from-orange-500 to-amber-400 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <span class="ml-3 font-medium text-amber-400">Actualización de Políticas</span>
                        </div>
                        <p class="text-slate-300 leading-relaxed">Nos reservamos el derecho, a nuestra sola discreción, de
                            modificar o reemplazar estos Términos en cualquier momento. Si una revisión es material,
                            intentaremos proporcionar un aviso de al menos 30 días antes de que los nuevos términos entren
                            en vigencia.</p>
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
    </style>
@endsection