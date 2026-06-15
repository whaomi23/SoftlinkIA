@props(['categorias'])

@isset($categorias)
    @php
        $selected = request('categoria');
    @endphp
    <div class="relative z-20 mb-8">
        <div class="relative">
            <!-- Navigation Arrows -->
            <button id="prevBtn"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white hover:bg-gray-50 border border-gray-200 rounded-full p-3 shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-110">
                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
            </button>

            <button id="nextBtn"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white hover:bg-gray-50 border border-gray-200 rounded-full p-3 shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-110">
                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <!-- Carousel Container -->
            <div class="relative mx-12">
                <div class="overflow-x-auto scrollbar-hide" id="categoryCarousel"
                    style="scrollbar-width: none; -ms-overflow-style: none;">
                    <div class="flex space-x-6 pb-4" style="width: max-content;">
                        <button onclick="filterByCategory('')"
                            class="group relative overflow-hidden inline-flex items-center px-6 py-3 rounded-2xl font-medium text-sm transition-all duration-500 flex-shrink-0 transform hover:scale-105 {{ !$selected ? 'bg-gradient-to-r from-kibi-primary to-kibi-accent text-white shadow-lg shadow-kibi-primary/25' : 'bg-white text-black border border-gray-200 hover:bg-gradient-to-r hover:from-kibi-primary hover:to-kibi-accent hover:text-white hover:shadow-lg hover:shadow-kibi-primary/25' }}">
                            <!-- Efectos de fondo animados -->
                            <div class="absolute inset-0 bg-gradient-to-r from-kibi-primary via-kibi-accent to-kibi-secondary opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                            
                            <span class="material-icons text-sm mr-2 relative z-10 group-hover:rotate-12 transition-transform duration-500">apps</span>
                            <span class="relative z-10">Todas las categorías</span>
                            
                            <!-- Borde de neón -->
                            <div class="absolute inset-0 rounded-2xl border-2 border-kibi-primary/50 group-hover:border-kibi-primary group-hover:shadow-[0_0_20px_rgba(2,175,201,0.6)] transition-all duration-500"></div>
                        </button>
                        @foreach($categorias as $categoria)
                            <button onclick="filterByCategory('{{ $categoria }}')"
                                class="group relative overflow-hidden inline-flex items-center px-6 py-3 rounded-2xl font-medium text-sm transition-all duration-500 flex-shrink-0 transform hover:scale-105 {{ $selected === $categoria ? 'bg-gradient-to-r from-kibi-primary to-kibi-accent text-white shadow-lg shadow-kibi-primary/25' : 'bg-white text-black border border-gray-200 hover:bg-gradient-to-r hover:from-kibi-primary hover:to-kibi-accent hover:text-white hover:shadow-lg hover:shadow-kibi-primary/25' }}">
                                <!-- Efectos de fondo animados -->
                                <div class="absolute inset-0 bg-gradient-to-r from-kibi-primary via-kibi-accent to-kibi-secondary opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                                
                                <span class="material-icons text-sm mr-2 relative z-10 group-hover:rotate-12 transition-transform duration-500">folder</span>
                                <span class="relative z-10">{{ $categoria }}</span>
                                
                                <!-- Borde de neón -->
                                <div class="absolute inset-0 rounded-2xl border-2 border-kibi-primary/50 group-hover:border-kibi-primary group-hover:shadow-[0_0_20px_rgba(2,175,201,0.6)] transition-all duration-500"></div>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endisset
