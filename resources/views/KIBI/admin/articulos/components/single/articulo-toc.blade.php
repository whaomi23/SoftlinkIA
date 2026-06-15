@props(['articulo', 'sections'])

<div class="glass-effect-enhanced rounded-lg shadow-lg border border-gray-300 p-3 mb-6 bg-white/80 backdrop-blur-sm">
    <div class="px-3 py-2 flex items-center justify-between cursor-pointer toc-header">
        <h4 class="text-black font-medium text-sm">Tabla de contenido</h4>
        <svg class="w-4 h-4 text-blue-600 transition-transform duration-300 toc-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>
    <div class="toc-content" style="display: none;">
        <nav class="space-y-1">
            @php
                // Generar secciones automáticamente desde el contenido
                $autoSections = [];
                if (!empty($articulo->contenido)) {
                    // Primero buscar encabezados HTML h1, h2, h3, h4 en el contenido
                    preg_match_all('/<h([1-4])[^>]*>(.*?)<\/h[1-4]>/i', $articulo->contenido, $htmlMatches, PREG_SET_ORDER);
                    foreach ($htmlMatches as $index => $match) {
                        $level = $match[1];
                        $title = strip_tags($match[2]);
                        if (!empty(trim($title))) {
                            $autoSections[] = [
                                'title' => trim($title),
                                'level' => $level,
                                'id' => 'auto-section-' . ($index + 1)
                            ];
                        }
                    }
                    
                    // Si no encontramos encabezados HTML, buscar encabezados markdown y numerados
                    if (empty($autoSections)) {
                        $lines = preg_split('/\r\n|\r|\n/', $articulo->contenido);
                        $index = 0;
                        foreach ($lines as $line) {
                            $trimmed = trim($line);
                            $isMarkdown = preg_match('/^##\s+(.*)$/', $line, $m1) === 1;
                            $isNumbered = !$isMarkdown && preg_match('/^\s*\d+\.\s+(.*)$/', $line, $m2) === 1;
                            
                            if ($isMarkdown || $isNumbered) {
                                $title = $isMarkdown ? trim($m1[1]) : trim($m2[1]);
                                if (!empty(trim($title))) {
                                    $autoSections[] = [
                                        'title' => trim($title),
                                        'level' => $isMarkdown ? '2' : '2',
                                        'id' => 'auto-section-' . (++$index)
                                    ];
                                }
                            }
                        }
                    }
                    
                    // Si aún no encontramos nada, buscar párrafos que parezcan títulos
                    if (empty($autoSections)) {
                        // Buscar párrafos HTML que parezcan títulos
                        preg_match_all('/<p[^>]*>(.*?)<\/p>/i', $articulo->contenido, $pMatches, PREG_SET_ORDER);
                        $index = 0;
                        foreach ($pMatches as $match) {
                            $content = strip_tags($match[1]);
                            $trimmed = trim($content);
                            
                            // Buscar párrafos que parezcan títulos
                            if (strlen($trimmed) > 5 && 
                                strlen($trimmed) < 100 && 
                                !preg_match('/^\d+\./', $trimmed) && 
                                !preg_match('/^[a-z]/', $trimmed) && // No empieza con minúscula
                                preg_match('/^[A-ZÁÉÍÓÚÑ]/', $trimmed) && // Empieza con mayúscula
                                !preg_match('/[.!?]$/', $trimmed) && // No termina con puntuación
                                !preg_match('/^<[^>]+>/', $trimmed)) { // No es HTML
                                
                                $autoSections[] = [
                                    'title' => $trimmed,
                                    'level' => '2',
                                    'id' => 'auto-section-' . (++$index)
                                ];
                            }
                        }
                    }
                    
                    // Si aún no encontramos nada, crear secciones basadas en el contenido general
                    if (empty($autoSections)) {
                        // Dividir el contenido en secciones lógicas
                        $content = strip_tags($articulo->contenido);
                        $paragraphs = preg_split('/\n\s*\n/', $content);
                        $index = 0;
                        
                        foreach ($paragraphs as $paragraph) {
                            $trimmed = trim($paragraph);
                            if (strlen($trimmed) > 20 && strlen($trimmed) < 200) {
                                // Tomar las primeras palabras como título
                                $words = explode(' ', $trimmed);
                                $title = implode(' ', array_slice($words, 0, 6)); // Primeras 6 palabras
                                if (strlen($title) > 10) {
                                    $autoSections[] = [
                                        'title' => $title . '...',
                                        'level' => '2',
                                        'id' => 'auto-section-' . (++$index)
                                    ];
                                }
                            }
                        }
                    }
                    
                    // Si aún no hay secciones, crear una sección genérica
                    if (empty($autoSections)) {
                        $autoSections[] = [
                            'title' => 'Contenido Principal',
                            'level' => '2',
                            'id' => 'auto-section-1'
                        ];
                    }
                }
                
                // Usar secciones del parseContenido si existen, sino usar las automáticas
                $finalSections = !empty($sections) ? $sections : $autoSections;
            @endphp
            
            @if(!empty($finalSections) && count($finalSections) > 0)
                @foreach($finalSections as $s)
                    @php 
                        $secId = isset($s['id']) ? $s['id'] : Str::slug($s['title'] ?? ('seccion-' . $loop->iteration));
                        $title = $s['title'] ?? 'Sección ' . $loop->iteration;
                    @endphp
                    <a href="#{{ $secId }}" 
                       class="block text-sm text-gray-700 hover:text-blue-600 transition-colors py-2 toc-link"
                       data-target="{{ $secId }}">
                        {{ $title }}
                    </a>
                @endforeach
            @else
                <p class="text-sm text-gray-500 py-2">No hay secciones disponibles</p>
            @endif
        </nav>
    </div>
</div>
