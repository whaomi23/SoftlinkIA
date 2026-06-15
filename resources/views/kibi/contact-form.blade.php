@extends('kibi.layouts.auth')

@section('title', 'KIBI - Formulario de Contacto')

@section('content')
<section class="min-h-screen bg-gray-100 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con navegación -->
        <div class="bg-blue-900 text-white py-4 px-6 rounded-t-xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-teal-400 rounded"></div>
                    <span class="text-xl font-bold">SoftLinkIA</span>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="hover:text-teal-300 transition-colors">Inicio</a>
                    <a href="#" class="hover:text-teal-300 transition-colors">Servicios</a>
                    <a href="#" class="hover:text-teal-300 transition-colors">Sobre Nosotros</a>
                    <a href="#" class="hover:text-teal-300 transition-colors">Soluciones</a>
                    <a href="#" class="hover:text-teal-300 transition-colors">Contacto</a>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm">Modo Oscuro</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario principal -->
        <div class="bg-white rounded-b-xl shadow-lg p-8">
            <!-- Logo KIBI -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold">
                    <span class="text-teal-500">K</span><span class="text-teal-500">i</span><span class="text-green-400">bi</span>
                </h1>
            </div>

            <!-- Formulario -->
            <form method="POST" action="{{ route('kibi.contact.store') }}" class="space-y-6">
                @csrf

                <!-- Información Personal -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required
                               class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                               placeholder="Tu nombre completo">
                    </div>
                    <div>
                        <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-2">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" required
                               class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                               placeholder="Tus apellidos">
                    </div>
                </div>

                <!-- Información de Contacto -->
                <div>
                    <label for="celular" class="block text-sm font-medium text-gray-700 mb-2">Celular</label>
                    <div class="flex space-x-2">
                        <div class="w-20">
                            <input type="text" value="+52" readonly
                                   class="w-full px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg text-center text-sm">
                            <div class="text-xs text-gray-500 mt-1 text-center">Clave</div>
                        </div>
                        <div class="flex-1">
                            <input type="tel" id="celular" name="celular" required
                                   class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                                   placeholder="Número de celular">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo institucional</label>
                    <input type="email" id="email" name="email" required
                           class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                           placeholder="tu.email@institucion.com">
                </div>

                <!-- Información Institucional -->
                <div>
                    <label for="institucion" class="block text-sm font-medium text-gray-700 mb-2">Colegio/Institución</label>
                    <input type="text" id="institucion" name="institucion" required
                           class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                           placeholder="Nombre de tu institución">
                </div>

                <div>
                    <label for="puesto" class="block text-sm font-medium text-gray-700 mb-2">Puesto/Cargo</label>
                    <input type="text" id="puesto" name="puesto" required
                           class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                           placeholder="Tu puesto o cargo">
                </div>

                <!-- Ubicación -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="ciudad" class="block text-sm font-medium text-gray-700 mb-2">Ciudad</label>
                        <input type="text" id="ciudad" name="ciudad" required
                               class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                               placeholder="Tu ciudad">
                    </div>
                    <div>
                        <label for="estado" class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                        <input type="text" id="estado" name="estado" required
                               class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                               placeholder="Tu estado">
                    </div>
                </div>

                <!-- Sitio web opcional -->
                <div>
                    <label for="sitio_web" class="block text-sm font-medium text-gray-700 mb-2">Sitio web (Opcional)</label>
                    <input type="url" id="sitio_web" name="sitio_web"
                           class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                           placeholder="https://tu-sitio-web.com">
                </div>

                <!-- Checkboxes -->
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="terminos" name="terminos" required
                               class="mt-1 w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 focus:ring-2">
                        <label for="terminos" class="text-sm text-gray-700">
                            Acepto <a href="#" class="text-teal-600 hover:text-teal-700 underline">términos y condiciones</a>,
                            <a href="#" class="text-teal-600 hover:text-teal-700 underline">Política de privacidad</a> y la
                            <a href="#" class="text-teal-600 hover:text-teal-700 underline">Política de cookies</a>.
                        </label>
                    </div>

                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="whatsapp" name="whatsapp"
                               class="mt-1 w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 focus:ring-2">
                        <label for="whatsapp" class="text-sm text-gray-700">
                            Me gustaría que me contacten vía WhatsApp
                        </label>
                    </div>

                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="email_contact" name="email_contact"
                               class="mt-1 w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 focus:ring-2">
                        <label for="email_contact" class="text-sm text-gray-700">
                            Me gustaría que me contacten vía email
                        </label>
                    </div>
                </div>

                <!-- Botón de envío -->
                <div class="pt-6">
                    <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@stack('scripts')
@endsection
