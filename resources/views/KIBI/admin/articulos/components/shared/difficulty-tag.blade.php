@props(['nivel', 'size' => 'normal'])

@php
    $nivelesConIconos = [
        'Básico / Introductorio' => ['icon' => 'school', 'color' => 'green'],
        'Fácil' => ['icon' => 'lightbulb', 'color' => 'emerald'],
        'Intermedio bajo' => ['icon' => 'trending_up', 'color' => 'yellow'],
        'Intermedio' => ['icon' => 'equalizer', 'color' => 'orange'],
        'Intermedio alto' => ['icon' => 'upgrade', 'color' => 'amber'],
        'Avanzado' => ['icon' => 'speed', 'color' => 'red'],
        'Experto' => ['icon' => 'star', 'color' => 'purple'],
        'Investigación / Académico' => ['icon' => 'science', 'color' => 'indigo'],
        'Crítico / Analítico' => ['icon' => 'psychology', 'color' => 'slate'],
        'Práctico / Aplicado' => ['icon' => 'engineering', 'color' => 'teal'],
    ];
    
    $nivelData = $nivelesConIconos[$nivel] ?? ['icon' => 'trending_up', 'color' => 'gray'];
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

<span class="inline-flex items-center {{ $classes['container'] }} text-black bg-gradient-to-r from-{{ $nivelColor }}-100 to-{{ $nivelColor }}-200 rounded-full border border-{{ $nivelColor }}-300 group-hover:from-{{ $nivelColor }}-200 group-hover:to-{{ $nivelColor }}-300 group-hover:border-{{ $nivelColor }}-400 transition-all duration-500">
    <span class="material-icons {{ $classes['icon'] }} text-{{ $nivelColor }}-600">{{ $nivelIcon }}</span>
    {{ strtoupper($nivel) }}
</span>
