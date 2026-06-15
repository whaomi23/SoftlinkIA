@props(['casoExito'])

<div class="glass-effect-enhanced rounded-lg shadow-lg border border-slate-700/50 p-8 mb-8 bg-slate-800/30 backdrop-blur-sm">
    <h3 class="text-2xl font-bold text-white mb-6">Acerca del Autor</h3>
    <div class="flex items-start space-x-4">
        <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-cyan-600 rounded-full flex items-center justify-center flex-shrink-0">
            <span class="material-icons text-white text-2xl">person</span>
        </div>
        <div class="flex-1">
            <h4 class="text-lg font-semibold text-white mb-2">
                {{ $casoExito->autor->name }} {{ $casoExito->autor->apellido_paterno }} {{ $casoExito->autor->apellido_materno }}
            </h4>
            <p class="text-slate-300 leading-relaxed">
                Experto en tecnología y desarrollo de software con más de 5 años de experiencia en la industria. 
                Apasionado por compartir conocimiento y ayudar a otros desarrolladores a crecer profesionalmente.
            </p>
        </div>
    </div>
</div>
