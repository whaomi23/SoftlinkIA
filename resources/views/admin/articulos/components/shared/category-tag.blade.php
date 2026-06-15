@props(['categoria', 'size' => 'normal'])

@php
    $categoriasConIconos = [
        'Desarrollo Web' => ['icon' => 'language', 'color' => 'blue'],
        'Inteligencia Artificial' => ['icon' => 'smart_toy', 'color' => 'purple'],
        'Ciberseguridad' => ['icon' => 'shield', 'color' => 'red'],
        'Cloud Computing' => ['icon' => 'cloud_queue', 'color' => 'cyan'],
        'DevOps' => ['icon' => 'build', 'color' => 'green'],
        'Mobile Development' => ['icon' => 'smartphone', 'color' => 'orange'],
        'Data Science' => ['icon' => 'bar_chart', 'color' => 'indigo'],
        'Blockchain' => ['icon' => 'account_balance_wallet', 'color' => 'yellow'],
        'IoT' => ['icon' => 'sensors', 'color' => 'teal'],
        'UI/UX Design' => ['icon' => 'palette', 'color' => 'pink'],
        'Gaming' => ['icon' => 'videogame_asset', 'color' => 'lime'],
        'Redes' => ['icon' => 'hub', 'color' => 'amber'],
        'Base de Datos' => ['icon' => 'storage', 'color' => 'brown'],
        'Testing' => ['icon' => 'bug_report', 'color' => 'deep-orange'],
        'Microservicios' => ['icon' => 'view_module', 'color' => 'grey'],
        'API Development' => ['icon' => 'api', 'color' => 'light-blue'],
    ];
    
    $iconData = $categoriasConIconos[$categoria] ?? ['icon' => 'category', 'color' => 'gray'];
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
