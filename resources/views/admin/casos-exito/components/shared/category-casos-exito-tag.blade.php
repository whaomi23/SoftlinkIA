@props(['categoria', 'size' => 'normal'])

@php
    $categoriasConIconos = [
        'Desarrollo Web' => ['icon' => 'language', 'color' => 'blue'],
        'Inteligencia Artificial' => ['icon' => 'smart_toy', 'color' => 'purple'],
        'Ciberseguridad' => ['icon' => 'shield', 'color' => 'red'],
        'Cloud Computing' => ['icon' => 'cloud_queue', 'color' => 'sky'],
        'DevOps' => ['icon' => 'build', 'color' => 'emerald'],
        'Mobile Development' => ['icon' => 'smartphone', 'color' => 'amber'],
        'Data Science' => ['icon' => 'bar_chart', 'color' => 'cyan'],
        'Blockchain' => ['icon' => 'account_balance_wallet', 'color' => 'yellow'],
        'IoT' => ['icon' => 'sensors', 'color' => 'teal'],
        'UI/UX Design' => ['icon' => 'palette', 'color' => 'rose'],
        'Gaming' => ['icon' => 'videogame_asset', 'color' => 'lime'],
        'Redes' => ['icon' => 'hub', 'color' => 'orange'],
        'Base de Datos' => ['icon' => 'storage', 'color' => 'violet'],
        'Testing' => ['icon' => 'bug_report', 'color' => 'fuchsia'],
        'Microservicios' => ['icon' => 'view_module', 'color' => 'indigo'],
        'API Development' => ['icon' => 'api', 'color' => 'green'],
    ];
    
    $iconData = $categoriasConIconos[$categoria] ?? ['icon' => 'category', 'color' => 'cyan'];
    $icon = $iconData['icon'];
    $color = $iconData['color'];
    
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

<span class="inline-flex items-center {{ $classes['container'] }} text-white bg-gradient-to-r from-{{ $color }}-500/20 to-{{ $color }}-600/20 rounded-full border border-{{ $color }}-400/30 group-hover:from-{{ $color }}-500 group-hover:to-{{ $color }}-600 group-hover:border-{{ $color }}-400 transition-all duration-500">
    <span class="material-icons {{ $classes['icon'] }}">{{ $icon }}</span>
    {{ strtoupper($categoria) }}
</span>
