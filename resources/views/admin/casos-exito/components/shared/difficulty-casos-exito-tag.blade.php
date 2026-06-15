@props(['nivel', 'size' => 'normal'])

@php
    $nivelesConIconos = [
        'Básico / Introductorio' => ['icon' => 'school', 'color' => 'sky'],
        'Fácil' => ['icon' => 'lightbulb', 'color' => 'lime'],
        'Intermedio bajo' => ['icon' => 'trending_up', 'color' => 'cyan'],
        'Intermedio' => ['icon' => 'equalizer', 'color' => 'amber'],
        'Intermedio alto' => ['icon' => 'upgrade', 'color' => 'pink'],
        'Avanzado' => ['icon' => 'speed', 'color' => 'rose'],
        'Experto' => ['icon' => 'star', 'color' => 'purple'],
        'Investigación / Académico' => ['icon' => 'science', 'color' => 'indigo'],
        'Crítico / Analítico' => ['icon' => 'psychology', 'color' => 'violet'],
        'Práctico / Aplicado' => ['icon' => 'engineering', 'color' => 'fuchsia'],
    ];
    
    $nivelData = $nivelesConIconos[$nivel] ?? ['icon' => 'trending_up', 'color' => 'cyan'];
    $nivelIcon = $nivelData['icon'];
    $nivelColor = $nivelData['color'];
    
    // Configuración de tamaños
    $sizeClasses = [
        'small' => [
            'container' => 'px-2 py-0.5 text-xs font-medium',
            'icon' => 'text-xs mr-0.5'
        ],
        'normal' => [
            'container' => 'px-3 py-1 text-xs font-semibold',
            'icon' => 'text-xs mr-1'
        ],
        'large' => [
            'container' => 'px-4 py-2 text-sm font-semibold',
            'icon' => 'text-sm mr-2'
        ]
    ];
    
    $classes = $sizeClasses[$size] ?? $sizeClasses['normal'];
@endphp

<span class="inline-flex items-center {{ $classes['container'] }} text-white bg-gradient-to-r from-{{ $nivelColor }}-500/20 to-{{ $nivelColor }}-600/20 rounded-full border border-{{ $nivelColor }}-400/30 group-hover:from-{{ $nivelColor }}-500 group-hover:to-{{ $nivelColor }}-600 group-hover:border-{{ $nivelColor }}-400 transition-all duration-500">
    <span class="material-icons {{ $classes['icon'] }}">{{ $nivelIcon }}</span>
    {{ strtoupper($nivel) }}
</span>
