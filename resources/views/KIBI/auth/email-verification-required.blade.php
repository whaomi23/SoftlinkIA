@extends('KIBI.layouts.auth')

@section('title', 'KIBI Educación - Verificación de Email Requerida')

@section('content')
<section class="relative overflow-hidden" style="min-height: calc(100vh - 80px); padding: 2rem 0 4rem;">
    <div class="absolute inset-0 bg-white"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="min-h-[70vh] flex items-center justify-center">
            <div class="w-full max-w-4xl mx-auto">
                <div class="bg-white border border-slate-200 rounded-3xl shadow-2xl overflow-hidden">
                    <div class="relative"
                        style="background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1551288049-bebda4e38f71'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute top-10 left-10 w-32 h-32 bg-cyan-500/20 rounded-full blur-2xl"></div>
                            <div class="absolute bottom-10 right-10 w-40 h-40 bg-blue-500/20 rounded-full blur-2xl"></div>
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-purple-500/20 rounded-full blur-xl"></div>
                        </div>
                        <div class="relative z-10 p-8 lg:p-12 text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-sky-600 rounded-2xl mb-6 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                        </div>
                        <h1 class="text-4xl lg:text-5xl font-black text-white mb-4">Verificación de Email Requerida</h1>
                        <p class="text-lg text-slate-300 mb-6">Verifica tu email para acceder a todo el contenido educativo</p>

                        <div class="bg-slate-800/50 border border-slate-600/50 rounded-xl p-4 mb-8 max-w-md mx-auto">
                            <p class="text-slate-400 text-sm mb-2">Email registrado:</p>
                            <p class="text-white font-semibold">{{ auth('kibi')->user()->email }}</p>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <form method="POST" action="{{ route('kibi.email.resend') }}" class="inline">
                                @csrf
                                <input type="hidden" name="email" value="{{ auth('kibi')->user()->email }}">
                                <button type="submit" class="px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white font-semibold rounded-xl transition-all">Reenviar Email de Verificación</button>
                            </form>
                            <form method="POST" action="{{ route('kibi.logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-800 font-semibold rounded-xl transition-all">Cerrar Sesión</button>
                            </form>
                        </div>

                        <div class="mt-8 text-center">
                            <p class="text-slate-400 text-sm">¿No recibiste el email? Revisa tu carpeta de spam o contacta con soporte</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const resendForm = document.querySelector('form[action="{{ route('kibi.email.resend') }}"]');
        if (!resendForm) return;
        const resendButton = resendForm.querySelector('button[type="submit"]');
        resendForm.addEventListener('submit', function () {
            resendButton.disabled = true;
            resendButton.textContent = 'Reenviando...';
        });
    });
</script>
@endpush
@endsection


