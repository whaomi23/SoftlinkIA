@props(['paginator', 'class' => ''])

@if($paginator->hasPages())
    <div class="mt-8 flex justify-center {{ $class }}">
        <div class="flex items-center space-x-2">
            @if($paginator->previousPageUrl())
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="group relative overflow-hidden px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gradient-to-r hover:from-kibi-primary hover:to-kibi-accent hover:text-white transition-all duration-500 transform hover:scale-105 shadow-md hover:shadow-lg">
                    <span class="relative z-10">Anterior</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            @endif

            @php
                $currentPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();
                $startPage = max(1, $currentPage - 2);
                $endPage = min($lastPage, $currentPage + 2);
            @endphp

            @if($startPage > 1)
                <a href="{{ $paginator->url(1) }}"
                    class="group relative overflow-hidden px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gradient-to-r hover:from-kibi-primary hover:to-kibi-accent hover:text-white transition-all duration-500 transform hover:scale-105 shadow-md hover:shadow-lg">
                    <span class="relative z-10">1</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                @if($startPage > 2)
                    <span class="px-4 py-2 text-sm font-medium text-slate-500">...</span>
                @endif
            @endif

            @for($page = $startPage; $page <= $endPage; $page++)
                @if($page == $currentPage)
                    <span class="relative overflow-hidden px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-kibi-primary to-kibi-accent border border-kibi-primary rounded-xl shadow-lg shadow-kibi-primary/25">
                        <span class="relative z-10">{{ $page }}</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-50"></div>
                    </span>
                @else
                    <a href="{{ $paginator->url($page) }}"
                        class="group relative overflow-hidden px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gradient-to-r hover:from-kibi-primary hover:to-kibi-accent hover:text-white transition-all duration-500 transform hover:scale-105 shadow-md hover:shadow-lg">
                        <span class="relative z-10">{{ $page }}</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                @endif
            @endfor

            @if($endPage < $lastPage)
                @if($endPage < $lastPage - 1)
                    <span class="px-4 py-2 text-sm font-medium text-slate-500">...</span>
                @endif
                <a href="{{ $paginator->url($lastPage) }}"
                    class="group relative overflow-hidden px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gradient-to-r hover:from-kibi-primary hover:to-kibi-accent hover:text-white transition-all duration-500 transform hover:scale-105 shadow-md hover:shadow-lg">
                    <span class="relative z-10">{{ $lastPage }}</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            @endif

            @if($paginator->nextPageUrl())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="group relative overflow-hidden px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gradient-to-r hover:from-kibi-primary hover:to-kibi-accent hover:text-white transition-all duration-500 transform hover:scale-105 shadow-md hover:shadow-lg">
                    <span class="relative z-10">Siguiente</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            @endif
        </div>
    </div>
@endif
