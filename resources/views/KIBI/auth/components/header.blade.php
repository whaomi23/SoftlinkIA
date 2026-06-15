<div class="text-center mb-8">
    <div class="inline-flex items-center justify-center mb-4">
        <img src="{{ asset('kibbi-images/kibi-logo.webp') }}" alt="KIBI" class="w-32 h-32 object-contain">
    </div>
    <h2 class="text-2xl font-bold text-slate-900 mb-2">{{ $title }}</h2>
    @isset($subtitle)
        <p class="text-slate-500 text-sm">{{ $subtitle }}</p>
    @endisset
    @isset($slot)
        {{ $slot }}
    @endisset
</div>
