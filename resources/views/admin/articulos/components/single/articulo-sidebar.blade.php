@props(['articulo', 'sections'])

<div class="sticky top-24 mt-8">
    <!-- Table of Contents -->
    @include('admin.articulos.components.single.articulo-toc', ['articulo' => $articulo, 'sections' => $sections])

    <!-- Newsletter Image -->
    <div class="mb-6">
        <img src="{{ asset('images/suscription.png') }}" alt="Newsletter" style="border-radius: 15px;">
    </div>

    <!-- Email Subscription Component -->
    <div class="glass-effect-enhanced rounded-2xl shadow-lg p-3 floating-card bg-slate-800/30 backdrop-blur-sm border border-slate-700/50 mb-6">
        <form id="newsletter-form" class="flex">
            @csrf
            <!-- Input Field -->
            <input type="email" 
                id="newsletter-email"
                name="email"
                required
                class="flex-1 px-3 py-2 bg-gray-100 rounded-l-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 transition-all duration-300 hover:shadow-md border-0 outline-none text-sm" 
                placeholder="Tu correo electrónico">
            <!-- Submit Button -->
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-r-xl transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-blue-500/25 flex items-center justify-center">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            </button>
        </form>
        <!-- Success/Error Messages -->
        <div id="newsletter-message" class="mt-2 text-sm hidden"></div>
    </div>

    <!-- Promotional Banner -->
    <div class="glass-effect-enhanced rounded-lg overflow-hidden relative shadow-lg border border-slate-700/50 bg-slate-800/30 backdrop-blur-sm">
        <!-- Background Image -->
        <div class="absolute inset-0 z-10">
            <img src="{{ asset('images/slider.png') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
        
        <!-- Content -->
        <div class="relative z-20 p-6 text-center h-64 flex flex-col justify-between items-center">
            <h3 class="text-white font-bold text-lg leading-tight">
                Software impulsado por IA
            </h3>
            
            <button type="button" data-bs-toggle="modal" data-bs-target="#contactFormModal" onclick="openContactForm()" class="bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-medium py-3 px-6 rounded-lg transition-all duration-500 transform hover:scale-105 shadow-lg hover:shadow-blue-500/25">
                Contrata a un experto
            </button>
        </div>
    </div>
</div>
