<div id="contactFormModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-slate-800/60 to-slate-900/80 backdrop-blur-sm" data-backdrop></div>
    <div class="relative z-10 flex min-h-full items-center justify-center p-4">
        <div class="w-full max-w-4xl max-h-[95vh] rounded-2xl border border-slate-600/50 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-slate-100 shadow-2xl flex flex-col overflow-hidden backdrop-blur-xl">
            <!-- Header with gradient background -->
            <div class="sticky top-0 z-10 flex items-center justify-between bg-gradient-to-r from-blue-600/20 via-cyan-600/20 to-indigo-500/20 px-6 py-5 backdrop-blur-md border-b border-slate-600/30">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-white">
                            <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z"/>
                            <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z"/>
                        </svg>
                    </div>
                    <div>
                        <h5 id="contactFormModalLabel" class="text-xl font-bold bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">Contáctanos</h5>
                        <p class="text-sm text-slate-400">Trabajemos juntos en tu próximo proyecto</p>
                    </div>
                </div>
                <button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-slate-400 hover:bg-slate-700/50 hover:text-white transition-all duration-200 hover:scale-105" data-close aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 8.586 4.293 2.879a1 1 0 1 0-1.414 1.414L8.586 10l-5.707 5.707a1 1 0 0 0 1.414 1.414L10 11.414l5.707 5.707a1 1 0 0 0 1.414-1.414L11.414 10l5.707-5.707a1 1 0 1 0-1.414-1.414L10 8.586Z" clip-rule="evenodd"/></svg>
                </button>
            </div>
            <div class="px-6 py-6 overflow-y-auto flex-1">
                <div id="contact-form-alert" class="hidden rounded-xl px-4 py-3 text-sm mb-6 transition-all duration-300" role="alert"></div>

                <form id="contactForm" action="{{ route('contact.store') }}" method="POST" novalidate>
                    @csrf

                    <input type="hidden" id="formStep" value="1">

                    <!-- Enhanced Step Indicators -->
                    <div class="mb-16">
                        <div class="flex items-center justify-center">
                            <div class="flex items-center space-x-8">
                                <!-- Step 1 -->
                                <div class="flex items-center">
                                    <div class="relative flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-slate-600 to-slate-700 font-bold text-white shadow-lg transition-all duration-300 data-[active=true]:from-blue-500 data-[active=true]:to-blue-600 data-[active=true]:scale-110 data-[done=true]:from-emerald-500 data-[done=true]:to-emerald-600 data-[done=true]:scale-105" data-step-indicator="1">
                                        <span class="text-sm">1</span>
                                        <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-xs font-medium text-slate-400 whitespace-nowrap">Información</div>
                                    </div>
                                </div>
                                
                                <!-- Connector 1 -->
                                <div class="h-1 w-20 rounded-full bg-gradient-to-r from-slate-600/30 to-slate-600/30 transition-all duration-500 data-[active=true]:from-blue-500/50 data-[active=true]:to-blue-500/50 data-[done=true]:from-emerald-500/50 data-[done=true]:to-emerald-500/50" data-connector="1"></div>
                                
                                <!-- Step 2 -->
                                <div class="flex items-center">
                                    <div class="relative flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-slate-600 to-slate-700 font-bold text-white shadow-lg transition-all duration-300 data-[active=true]:from-blue-500 data-[active=true]:to-blue-600 data-[active=true]:scale-110 data-[done=true]:from-emerald-500 data-[done=true]:to-emerald-600 data-[done=true]:scale-105" data-step-indicator="2">
                                        <span class="text-sm">2</span>
                                        <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-xs font-medium text-slate-400 whitespace-nowrap">Proyecto</div>
                                    </div>
                                </div>
                                
                                <!-- Connector 2 -->
                                <div class="h-1 w-20 rounded-full bg-gradient-to-r from-slate-600/30 to-slate-600/30 transition-all duration-500 data-[active=true]:from-blue-500/50 data-[active=true]:to-blue-500/50 data-[done=true]:from-emerald-500/50 data-[done=true]:to-emerald-500/50" data-connector="2"></div>
                                
                                <!-- Step 3 -->
                                <div class="flex items-center">
                                    <div class="relative flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-slate-600 to-slate-700 font-bold text-white shadow-lg transition-all duration-300 data-[active=true]:from-blue-500 data-[active=true]:to-blue-600 data-[active=true]:scale-110 data-[done=true]:from-emerald-500 data-[done=true]:to-emerald-600 data-[done=true]:scale-105" data-step-indicator="3">
                                        <span class="text-sm">3</span>
                                        <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-xs font-medium text-slate-400 whitespace-nowrap">Finalizar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-step="1" class="transition-all duration-300">
                        <h6 class="sr-only">Paso 1</h6>
                        <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div class="space-y-2">
                                <label for="nombre" class="block text-sm font-semibold text-slate-200">
                                    <span class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-blue-400">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                        </svg>
                                        Nombre
                                        <span class="text-red-400">*</span>
                                    </span>
                                </label>
                                <input type="text" id="nombre" name="nombre" required 
                                       class="block w-full rounded-xl border border-slate-600/50 bg-slate-800/50 px-4 py-3 text-slate-100 placeholder-slate-400 outline-none ring-0 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 hover:border-slate-500">
                                <div class="mt-1 text-sm text-red-400" data-error-for="nombre"></div>
                            </div>
                            
                            <div class="space-y-2">
                                <label for="compania" class="block text-sm font-semibold text-slate-200">
                                    <span class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-blue-400">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-6a1 1 0 00-1-1H9a1 1 0 00-1 1v6a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                                        </svg>
                                        Compañía
                                        <span class="text-red-400">*</span>
                                    </span>
                                </label>
                                <input type="text" id="compania" name="compania" required 
                                       class="block w-full rounded-xl border border-slate-600/50 bg-slate-800/50 px-4 py-3 text-slate-100 placeholder-slate-400 outline-none ring-0 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 hover:border-slate-500">
                                <div class="mt-1 text-sm text-red-400" data-error-for="compania"></div>
                            </div>

                            <div class="space-y-2">
                                <label for="industria" class="block text-sm font-semibold text-slate-200">
                                    <span class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-blue-400">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Industria
                                        <span class="text-red-400">*</span>
                                    </span>
                                </label>
                                <select id="industria" name="industria" required 
                                        class="block w-full rounded-xl border border-slate-600/50 bg-slate-800/50 px-4 py-3 text-slate-100 outline-none ring-0 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 hover:border-slate-500">
                                    <option value="" selected disabled>Selecciona una opción</option>
                                    <option>Medios de difusión</option>
                                    <option>Tecnología</option>
                                    <option>Salud</option>
                                    <option>Educación</option>
                                    <option>Finanzas</option>
                                    <option>Otro</option>
                                </select>
                                <div class="mt-1 text-sm text-red-400" data-error-for="industria"></div>
                            </div>
                            
                            <div class="space-y-2">
                                <label for="telefono" class="block text-sm font-semibold text-slate-200">
                                    <span class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-blue-400">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                        </svg>
                                        Teléfono
                                    </span>
                                </label>
                                <input type="text" id="telefono" name="telefono" 
                                       class="block w-full rounded-xl border border-slate-600/50 bg-slate-800/50 px-4 py-3 text-slate-100 placeholder-slate-400 outline-none ring-0 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 hover:border-slate-500">
                                <div class="mt-1 text-sm text-red-400" data-error-for="telefono"></div>
                            </div>
                            
                            <div class="md:col-span-2 space-y-2">
                                <label for="email" class="block text-sm font-semibold text-slate-200">
                                    <span class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-blue-400">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                        </svg>
                                        Correo electrónico empresarial
                                        <span class="text-red-400">*</span>
                                    </span>
                                </label>
                                <input type="email" id="email" name="email" required 
                                       class="block w-full rounded-xl border border-slate-600/50 bg-slate-800/50 px-4 py-3 text-slate-100 placeholder-slate-400 outline-none ring-0 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 hover:border-slate-500">
                                <div class="mt-1 text-sm text-red-400" data-error-for="email"></div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end gap-3">
                            <button type="button" class="rounded-xl border border-slate-500/50 px-6 py-3 font-semibold text-slate-300 hover:bg-slate-700/50 hover:text-white transition-all duration-200 hover:scale-105" data-close>
                                Cancelar
                            </button>
                            <button type="button" class="rounded-xl bg-gradient-to-r from-cyan-600 to-blue-600 px-6 py-3 font-semibold text-white shadow-lg hover:from-cyan-700 hover:to-blue-700 transition-all duration-200 hover:scale-105 hover:shadow-xl" data-next>
                                <span class="flex items-center gap-2">
                                    <span>Próximo</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="hidden transition-all duration-300" data-step="2">
                        <h6 class="sr-only">Paso 2</h6>
                        <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div class="space-y-2">
                                <label for="tipo_consulta" class="block text-sm font-semibold text-slate-200">
                                    <span class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-blue-400">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                        </svg>
                                        Tipo de consulta
                                        <span class="text-red-400">*</span>
                                    </span>
                                </label>
                                <select id="tipo_consulta" name="tipo_consulta" required 
                                        class="block w-full rounded-xl border border-slate-600/50 bg-slate-800/50 px-4 py-3 text-slate-100 outline-none ring-0 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 hover:border-slate-500">
                                    <option value="" selected disabled>Selecciona un asunto</option>
                                    <option value="consulta-general">Consulta General</option>
                                    <option value="cotizacion">Cotización de Servicios</option>
                                    <option value="soporte-tecnico">Soporte Técnico</option>
                                    <option value="colaboracion">Propuesta de Colaboración</option>
                                    <option value="trabajo">Oportunidad de Trabajo</option>
                                    <option value="otro">Otro</option>
                                </select>
                                <div class="mt-1 text-sm text-red-400" data-error-for="tipo_consulta"></div>
                            </div>
                            
                            <div class="space-y-2">
                                <label for="servicio" class="block text-sm font-semibold text-slate-200">
                                    <span class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-blue-400">
                                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        Servicio específico
                                    </span>
                                </label>
                                <select id="servicio" name="servicio" 
                                        class="block w-full rounded-xl border border-slate-600/50 bg-slate-800/50 px-4 py-3 text-slate-100 outline-none ring-0 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 hover:border-slate-500">
                                    <option value="" selected disabled>Selecciona un servicio (opcional)</option>
                                    <option value="consultoria-ti">Consultoría TI</option>
                                    <option value="ciberseguridad">Ciberseguridad</option>
                                    <option value="auditorias">Auditorías</option>
                                    <option value="soluciones-saas">Soluciones SaaS</option>
                                    <option value="reingenieria">Reingeniería</option>
                                    <option value="soluciones-medida">Soluciones a Medida</option>
                                </select>
                                <div class="mt-1 text-sm text-red-400" data-error-for="servicio"></div>
                            </div>
                            
                            <div class="space-y-2">
                                <label for="profesionales" class="block text-sm font-semibold text-slate-200">
                                    <span class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-blue-400">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                        </svg>
                                        Profesionales para el proyecto
                                        <span class="text-red-400">*</span>
                                    </span>
                                </label>
                                <input type="number" id="profesionales" name="profesionales" min="1" max="100" required 
                                       class="block w-full rounded-xl border border-slate-600/50 bg-slate-800/50 px-4 py-3 text-slate-100 placeholder-slate-400 outline-none ring-0 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 hover:border-slate-500">
                                <div class="mt-1 text-sm text-red-400" data-error-for="profesionales"></div>
                            </div>
                            
                            <div class="md:col-span-2 space-y-2">
                                <label for="mensaje" class="block text-sm font-semibold text-slate-200">
                                    <span class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-blue-400">
                                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"/>
                                        </svg>
                                        Mensaje
                                        <span class="text-red-400">*</span>
                                    </span>
                                </label>
                                <textarea id="mensaje" name="mensaje" rows="4" required 
                                          class="block w-full rounded-xl border border-slate-600/50 bg-slate-800/50 px-4 py-3 text-slate-100 placeholder-slate-400 outline-none ring-0 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 hover:border-slate-500 resize-none"></textarea>
                                <div class="mt-1 text-sm text-red-400" data-error-for="mensaje"></div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-slate-200 mb-2 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-blue-400">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Tecnologías involucradas
                                </h3>
                                <p class="text-sm text-slate-400">Selecciona las tecnologías que necesitas para tu proyecto</p>
                            </div>
                            <div class="grid grid-cols-2 gap-3 md:grid-cols-3 lg:grid-cols-4">
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="AWS" id="t-aws">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">AWS</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Azure" id="t-azure">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">Azure</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Django" id="t-django">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">Django</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Gitlab" id="t-gitlab">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">GitLab</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Java" id="t-java">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">Java</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Jenkins" id="t-jenkins">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">Jenkins</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Kubernetes" id="t-k8s">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">Kubernetes</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Lambda" id="t-lambda">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">Lambda</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Laravel" id="t-laravel">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">Laravel</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Node.js" id="t-node">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">Node.js</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Python" id="t-python">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">Python</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="React" id="t-react">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">React</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Terraform" id="t-terraform">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">Terraform</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="Vue" id="t-vue">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">Vue.js</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="PHP" id="t-php">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">PHP</span>
                                </label>
                                <label class="group flex items-center gap-3 p-3 rounded-xl border border-slate-600/30 bg-slate-800/30 hover:bg-slate-700/50 hover:border-blue-500/50 transition-all duration-200 cursor-pointer">
                                    <input class="h-4 w-4 rounded border-slate-500 bg-slate-700 text-blue-500 focus:ring-blue-500 focus:ring-2" type="checkbox" name="tecnologias[]" value="JavaScript" id="t-js">
                                    <span class="text-sm font-medium text-slate-200 group-hover:text-white">JavaScript</span>
                                </label>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-between gap-3">
                            <button type="button" class="rounded-xl border border-slate-500/50 px-6 py-3 font-semibold text-slate-300 hover:bg-slate-700/50 hover:text-white transition-all duration-200 hover:scale-105" data-prev>
                                <span class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Anterior</span>
                                </span>
                            </button>
                            <button type="button" class="rounded-xl bg-gradient-to-r from-cyan-600 to-blue-600 px-6 py-3 font-semibold text-white shadow-lg hover:from-cyan-700 hover:to-blue-700 transition-all duration-200 hover:scale-105 hover:shadow-xl" data-next>
                                <span class="flex items-center gap-2">
                                    <span>Próximo</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="hidden transition-all duration-300" data-step="3">
                        <h6 class="sr-only">Paso 3</h6>
                        
                        <!-- Success Message -->
                        <div class="mt-8 mb-8 text-center">
                            <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-8 w-8 text-white">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-200 mb-2">¡Casi terminamos!</h3>
                            <p class="text-slate-400 mb-1">Un representante de ventas se pondrá en contacto contigo en las próximas horas.</p>
                            <p class="text-sm text-slate-500">Si tienes unos segundos libres, responde a la siguiente pregunta.</p>
                        </div>

                        <div class="space-y-2">
                            <label for="donde_encontraste" class="block text-sm font-semibold text-slate-200">
                                <span class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-blue-400">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                    ¿Dónde nos encontraste?
                                    <span class="text-red-400">*</span>
                                </span>
                            </label>
                            <select id="donde_encontraste" name="donde_encontraste" required 
                                    class="block w-full rounded-xl border border-slate-600/50 bg-slate-800/50 px-4 py-3 text-slate-100 outline-none ring-0 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:bg-slate-800 hover:border-slate-500">
                                <option value="" selected disabled>Selecciona una opción</option>
                                <option value="google">Google</option>
                                <option value="linkedin">LinkedIn</option>
                                <option value="facebook">Facebook</option>
                                <option value="instagram">Instagram</option>
                                <option value="twitter">Twitter/X</option>
                                <option value="recomendacion">Recomendación de un amigo/colega</option>
                                <option value="evento">Evento o conferencia</option>
                                <option value="referencia-cliente">Referencia de cliente</option>
                                <option value="busqueda-directa">Búsqueda directa en internet</option>
                                <option value="otro">Otro</option>
                            </select>
                            <div class="mt-1 text-sm text-red-400" data-error-for="donde_encontraste"></div>
                        </div>

                        <div class="mt-8 flex justify-between gap-3">
                            <button type="button" class="rounded-xl border border-slate-500/50 px-6 py-3 font-semibold text-slate-300 hover:bg-slate-700/50 hover:text-white transition-all duration-200 hover:scale-105" data-prev>
                                <span class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Anterior</span>
                                </span>
                            </button>
                            <button id="contactFormSubmit" type="submit" class="inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-emerald-500 to-emerald-600 px-8 py-3 font-semibold text-white shadow-lg hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200 hover:scale-105 hover:shadow-xl">
                                <span class="submit-label flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                                    </svg>
                                    <span>Enviar Solicitud</span>
                                </span>
                                <svg class="spinner hidden h-4 w-4 animate-spin text-white" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                                    <circle class="opacity-25" cx="25" cy="25" r="20" stroke="currentColor" stroke-width="5" fill="none"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M25 5a20 20 0 0 1 20 20h-5A15 15 0 0 0 25 10V5z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Enhanced Footer -->
            <div class="sticky bottom-0 z-10 bg-gradient-to-t from-slate-900 via-slate-800/80 to-transparent px-6 py-4 backdrop-blur-sm">
                <div class="flex items-center justify-between text-xs text-slate-500">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3 w-3">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                        </svg>
                        <span>Tus datos están seguros</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span>Powered by</span>
                        <span class="font-semibold text-blue-400">SoftlinkIA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        if (window.__contactFormBound) return;
        window.__contactFormBound = true;

        // API para abrir/cerrar modal con Tailwind
        window.openContactForm = function () {
            const modalEl = document.getElementById('contactFormModal');
            if (!modalEl) return;
            modalEl.classList.remove('hidden');
            modalEl.removeAttribute('aria-hidden');
            modalEl.setAttribute('aria-modal', 'true');
            document.documentElement.classList.add('overflow-y-hidden');
        };

        window.hideContactForm = function () {
            const modalEl = document.getElementById('contactFormModal');
            if (!modalEl) return;
            modalEl.classList.add('hidden');
            modalEl.setAttribute('aria-hidden', 'true');
            modalEl.removeAttribute('aria-modal');
            document.documentElement.classList.remove('overflow-y-hidden');
        };

        function setLoading(isLoading) {
            const btn = document.getElementById('contactFormSubmit');
            if (!btn) return;
            const label = btn.querySelector('.submit-label');
            const spinner = btn.querySelector('.spinner');
            btn.disabled = isLoading;
            if (label) label.classList.toggle('hidden', isLoading);
            if (spinner) spinner.classList.toggle('hidden', !isLoading);
            btn.classList.toggle('opacity-70', isLoading);
            btn.classList.toggle('cursor-not-allowed', isLoading);
        }

        function clearErrors(form) {
            form.querySelectorAll('.border-red-500').forEach(function (el) {
                el.classList.remove('border-red-500');
            });
            form.querySelectorAll('.ring-2').forEach(function (el) {
                el.classList.remove('ring-2');
            });
            form.querySelectorAll('.ring-red-500').forEach(function (el) {
                el.classList.remove('ring-red-500');
            });
            form.querySelectorAll('[data-error-for]').forEach(function (el) {
                el.textContent = '';
            });
            const alert = document.getElementById('contact-form-alert');
            if (alert) {
                alert.className = 'hidden rounded-xl px-4 py-3 text-sm transition-all duration-300';
                alert.textContent = '';
            }
        }

        function showAlert(type, message) {
            const alert = document.getElementById('contact-form-alert');
            if (!alert) return;
            const typeMap = {
                success: 'bg-gradient-to-r from-emerald-500/20 to-emerald-600/20 border border-emerald-500/30 text-emerald-200',
                danger: 'bg-gradient-to-r from-red-500/20 to-red-600/20 border border-red-500/30 text-red-200',
                warning: 'bg-gradient-to-r from-yellow-500/20 to-yellow-600/20 border border-yellow-500/30 text-yellow-200',
                info: 'bg-gradient-to-r from-blue-500/20 to-blue-600/20 border border-blue-500/30 text-blue-200'
            };
            alert.className = 'rounded-xl px-4 py-3 text-sm backdrop-blur-sm ' + (typeMap[type] || 'bg-slate-800/50 border border-slate-600/30 text-slate-200');
            alert.textContent = message;
            alert.classList.remove('hidden');
        }

        function setStep(step) {
            const current = Number(document.getElementById('formStep')?.value || 1);
            const next = Math.max(1, Math.min(3, Number(step)));
            if (current === next) return;
            
            document.getElementById('formStep').value = String(next);
            
            // Animate step panels
            document.querySelectorAll('[data-step]')?.forEach(function (panel) {
                const isTarget = Number(panel.getAttribute('data-step')) === next;
                panel.classList.toggle('hidden', !isTarget);
                if (isTarget) {
                    panel.style.opacity = '0';
                    panel.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        panel.style.opacity = '1';
                        panel.style.transform = 'translateY(0)';
                    }, 50);
                }
            });
            
            // Update step indicators
            document.querySelectorAll('[data-step-indicator]')?.forEach(function (el) {
                const num = Number(el.getAttribute('data-step-indicator'));
                el.setAttribute('data-active', String(num === next));
                el.setAttribute('data-done', String(num < next));
            });
            
            // Update connectors
            document.querySelectorAll('[data-connector]')?.forEach(function (el) {
                const num = Number(el.getAttribute('data-connector'));
                el.setAttribute('data-active', String(num <= next));
                el.setAttribute('data-done', String(num < next));
            });
        }

        function validateCurrentStep(form) {
            const step = Number(document.getElementById('formStep')?.value || 1);
            let valid = true;
            form.querySelectorAll('[data-step]')?.forEach(function (panel) {
                const isCurrent = Number(panel.getAttribute('data-step')) === step;
                if (!isCurrent) return;
                panel.querySelectorAll('[required]')?.forEach(function (input) {
                    if (input.type === 'checkbox') return;
                    if (!input.value || (input.type === 'select-one' && !input.value)) {
                        input.classList.add('border-red-500', 'ring-2', 'ring-red-500');
                        valid = false;
                    } else {
                        input.classList.remove('border-red-500', 'ring-2', 'ring-red-500');
                    }
                });
            });
            return valid;
        }

        document.addEventListener('click', function (e) {
            const nextBtn = e.target.closest('[data-next]');
            const prevBtn = e.target.closest('[data-prev]');
            const form = document.getElementById('contactForm');
            if (nextBtn && form) {
                clearErrors(form);
                if (!validateCurrentStep(form)) return;
                const step = Number(document.getElementById('formStep').value || 1);
                setStep(step + 1);
            }
            if (prevBtn) {
                const step = Number(document.getElementById('formStep').value || 1);
                setStep(step - 1);
            }
        });

        // Inicializar paso 1 al abrir el modal
        setTimeout(function () {
            setStep(1);
        }, 0);

        document.addEventListener('submit', async function (e) {
            const form = e.target;
            if (form && form.id === 'contactForm') {
                e.preventDefault();
                clearErrors(form);
                if (!validateCurrentStep(form)) return;
                setLoading(true);

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json'
                        },
                        body: new FormData(form)
                    });

                    const contentType = response.headers.get('content-type') || '';
                    const isJson = contentType.includes('application/json');
                    const data = isJson ? await response.json() : null;

                    if (response.ok) {
                        showAlert('success', data?.message || '¡Formulario enviado exitosamente!');
                        form.reset();
                        setTimeout(() => {
                            window.hideContactForm && window.hideContactForm();
                        }, 900);
                    } else if (response.status === 422) {
                        const errors = (data && data.errors) || {};
                        Object.keys(errors).forEach(function (field) {
                            const input = form.querySelector('[name="' + field + '"]');
                            const errorEl = form.querySelector('[data-error-for="' + field + '"]');
                            if (input) input.classList.add('border-red-500', 'ring-2', 'ring-red-500');
                            if (errorEl) errorEl.textContent = Array.isArray(errors[field]) ? errors[field][0] : String(errors[field]);
                        });
                        showAlert('danger', data?.message || 'Por favor corrige los campos marcados.');
                    } else {
                        showAlert('danger', data?.message || 'Ocurrió un error al enviar el formulario.');
                    }
                } catch (err) {
                    showAlert('danger', 'No se pudo conectar con el servidor. Intenta nuevamente.');
                } finally {
                    setLoading(false);
                }
            }
        });

        // Cierre por backdrop o botón [data-close]
        document.addEventListener('click', function (e) {
            if (e.target && (e.target.hasAttribute('data-backdrop') || e.target.closest('[data-close]'))) {
                e.preventDefault();
                window.hideContactForm && window.hideContactForm();
            }
        });
    })();
</script>


