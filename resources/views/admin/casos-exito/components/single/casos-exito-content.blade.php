@props(['casoExito', 'sections'])

<div class="mb-8">
    @if(!empty($casoExito->contenido))
        <div class="max-w-none text-slate-200 [&_h1]:text-2xl [&_h1]:font-extrabold [&_h1]:leading-tight [&_h1]:mt-8 [&_h1]:mb-4 [&_h1]:text-white [&_h1]:border-b-2 [&_h1]:border-amber-500 [&_h1]:pb-2 [&_h2]:text-xl [&_h2]:font-bold [&_h2]:leading-snug [&_h2]:mt-6 [&_h2]:mb-3 [&_h2]:text-white [&_h2]:border-l-4 [&_h2]:border-amber-500 [&_h2]:pl-4 [&_h3]:text-lg [&_h3]:font-semibold [&_h3]:leading-normal [&_h3]:mt-5 [&_h3]:mb-2 [&_h3]:text-white [&_h4]:text-base [&_h4]:font-semibold [&_h4]:leading-normal [&_h4]:mt-4 [&_h4]:mb-2 [&_h4]:text-white [&_h5]:text-base [&_h5]:font-semibold [&_h5]:leading-relaxed [&_h5]:mt-3 [&_h5]:mb-2 [&_h5]:text-white [&_h6]:text-sm [&_h6]:font-semibold [&_h6]:leading-relaxed [&_h6]:mt-3 [&_h6]:mb-2 [&_h6]:text-white [&_p]:mb-4 [&_p]:leading-relaxed [&_p]:text-slate-200 [&_p]:text-justify [&_strong]:font-bold [&_strong]:text-white [&_b]:font-bold [&_b]:text-white [&_em]:italic [&_em]:text-slate-300 [&_i]:italic [&_i]:text-slate-300 [&_a]:text-amber-400 [&_a]:no-underline [&_a]:border-b [&_a]:border-transparent [&_a]:transition-all [&_a]:duration-300 hover:[&_a]:text-amber-500 hover:[&_a]:underline hover:[&_a]:border-amber-500 [&_code]:text-rose-400 [&_code]:bg-stone-700 [&_code]:px-2 [&_code]:py-1 [&_code]:rounded [&_code]:text-sm [&_code]:font-mono [&_code]:border [&_code]:border-stone-600 [&_pre]:bg-stone-700 [&_pre]:text-slate-200 [&_pre]:p-4 [&_pre]:rounded-lg [&_pre]:border [&_pre]:border-stone-600 [&_pre]:overflow-x-auto [&_pre]:my-4 [&_pre]:font-mono [&_pre]:text-sm [&_pre]:leading-relaxed [&_pre_code]:bg-transparent [&_pre_code]:p-0 [&_pre_code]:border-0 [&_pre_code]:text-inherit [&_blockquote]:border-l-4 [&_blockquote]:border-rose-400 [&_blockquote]:text-rose-200 [&_blockquote]:bg-rose-500/10 [&_blockquote]:rounded-lg [&_blockquote]:p-4 [&_blockquote]:my-4 [&_blockquote]:italic [&_blockquote]:relative [&_img]:max-w-full [&_img]:h-auto [&_img]:rounded-lg [&_img]:my-4 [&_img]:shadow-lg [&_img]:border [&_img]:border-stone-600 [&_figure]:my-4 [&_figure]:text-center [&_figcaption]:text-sm [&_figcaption]:text-slate-400 [&_figcaption]:mt-2 [&_figcaption]:italic [&_hr]:border-0 [&_hr]:h-0.5 [&_hr]:bg-gradient-to-r [&_hr]:from-transparent [&_hr]:via-amber-500 [&_hr]:to-transparent [&_hr]:my-8 [&_del]:text-slate-400 [&_del]:line-through [&_s]:text-slate-400 [&_s]:line-through [&_u]:text-yellow-400 [&_u]:underline [&_mark]:bg-yellow-400 [&_mark]:text-slate-800 [&_mark]:px-1 [&_mark]:py-0.5 [&_mark]:rounded [&_sub]:text-xs [&_sub]:align-sub [&_sub]:text-slate-400 [&_sup]:text-xs [&_sup]:align-super [&_sup]:text-slate-400 [&_small]:text-sm [&_small]:text-slate-400 [&_big]:text-lg [&_big]:text-slate-200 [&_table]:w-full [&_table]:border-collapse [&_table]:border-spacing-0 [&_table]:my-8 [&_table]:bg-gradient-to-br [&_table]:from-stone-800 [&_table]:to-stone-700 [&_table]:text-stone-100 [&_table]:rounded-2xl [&_table]:overflow-hidden [&_table]:shadow-2xl [&_table]:border [&_table]:border-stone-600/30 [&_th]:bg-gradient-to-r [&_th]:from-orange-500 [&_th]:to-amber-600 [&_th]:text-white [&_th]:font-bold [&_th]:py-5 [&_th]:px-6 [&_th]:text-left [&_th]:text-sm [&_th]:uppercase [&_th]:tracking-wide [&_th]:relative [&_th]:border-b-2 [&_th]:border-amber-500 [&_th:first-child]:rounded-tl-2xl [&_th:last-child]:rounded-tr-2xl [&_td]:py-4 [&_td]:px-6 [&_td]:border-b [&_td]:border-stone-600/20 [&_td]:text-stone-100 [&_td]:text-sm [&_td]:leading-relaxed [&_td]:transition-all [&_td]:duration-200 [&_td]:relative [&_td:last-child]:border-b-0 [&_tr:last-child_td:first-child]:rounded-bl-2xl [&_tr:last-child_td:last-child]:rounded-br-2xl [&_tbody_tr:nth-child(even)]:bg-stone-700/30 [&_tbody_tr:hover]:bg-amber-500/10 [&_tbody_tr:hover]:transform [&_tbody_tr:hover]:-translate-y-0.5 [&_tbody_tr:hover]:shadow-lg [&_tbody_tr:hover]:shadow-amber-500/20 [&_tbody_tr:hover_td]:text-white [&_tbody_tr:hover_td]:text-shadow-sm [&_caption]:caption-bottom [&_caption]:text-slate-400 [&_caption]:text-xs [&_caption]:py-4 [&_caption]:px-6 [&_caption]:pt-2 [&_caption]:italic [&_caption]:text-center [&_caption]:opacity-80 [&_ul]:text-slate-200 [&_ol]:text-slate-200 [&_li]:text-base [&_li]:leading-relaxed [&_li]:mb-2 [&_li]:ml-6 [&_li]:pl-2 [&_li]:list-outside [&_ul_ul]:list-disc [&_ul_ul]:mt-1 [&_ul_ul_ul]:list-square [&_ol_ol]:list-decimal [&_ol_ol_ol]:list-lower-roman [&_ul_li]:marker:text-amber-500 [&_ol_li]:marker:text-amber-500 [&_input]:bg-stone-700 [&_input]:text-slate-200 [&_input]:border [&_input]:border-stone-600 [&_input]:rounded [&_input]:px-3 [&_input]:py-2 [&_input]:text-sm [&_textarea]:bg-stone-700 [&_textarea]:text-slate-200 [&_textarea]:border [&_textarea]:border-stone-600 [&_textarea]:rounded [&_textarea]:px-3 [&_textarea]:py-2 [&_textarea]:text-sm [&_textarea]:resize-y [&_select]:bg-stone-700 [&_select]:text-slate-200 [&_select]:border [&_select]:border-stone-600 [&_select]:rounded [&_select]:px-3 [&_select]:py-2 [&_select]:text-sm [&_button]:bg-amber-500 [&_button]:text-white [&_button]:border-0 [&_button]:rounded [&_button]:px-4 [&_button]:py-2 [&_button]:text-sm [&_button]:font-medium [&_button]:cursor-pointer [&_button]:transition-colors [&_button]:duration-200 hover:[&_button]:bg-amber-600 [&_.divider]:h-px [&_.divider]:bg-gradient-to-r [&_.divider]:from-transparent [&_.divider]:via-stone-600 [&_.divider]:to-transparent [&_.divider]:my-8 [&_.divider]:border-0 [&_.text-left]:text-left [&_.text-center]:text-center [&_.text-right]:text-right [&_.text-justify]:text-justify [&_.text-primary]:text-amber-500 [&_.text-secondary]:text-slate-400 [&_.text-success]:text-emerald-500 [&_.text-warning]:text-yellow-500 [&_.text-danger]:text-red-500 [&_.text-info]:text-orange-500 [&_.bg-primary]:bg-amber-500 [&_.bg-primary]:text-white [&_.bg-primary]:px-2 [&_.bg-primary]:py-1 [&_.bg-primary]:rounded [&_.bg-secondary]:bg-stone-600 [&_.bg-secondary]:text-slate-200 [&_.bg-secondary]:px-2 [&_.bg-secondary]:py-1 [&_.bg-secondary]:rounded [&_.bg-success]:bg-emerald-500 [&_.bg-success]:text-white [&_.bg-success]:px-2 [&_.bg-success]:py-1 [&_.bg-success]:rounded [&_.bg-warning]:bg-yellow-500 [&_.bg-warning]:text-white [&_.bg-warning]:px-2 [&_.bg-warning]:py-1 [&_.bg-warning]:rounded [&_.bg-danger]:bg-red-500 [&_.bg-danger]:text-white [&_.bg-danger]:px-2 [&_.bg-danger]:py-1 [&_.bg-danger]:rounded [&_.border]:border [&_.border]:border-stone-600 [&_.border]:p-2 [&_.border]:rounded [&_.border-primary]:border [&_.border-primary]:border-amber-500 [&_.border-primary]:p-2 [&_.border-primary]:rounded [&_.p-1]:p-1 [&_.p-2]:p-2 [&_.p-3]:p-3 [&_.p-4]:p-4 [&_.m-1]:m-1 [&_.m-2]:m-2 [&_.m-3]:m-3 [&_.m-4]:m-4" id="caso-exito-content">
            {!! $casoExito->contenido !!}
        </div>
    @endif
</div>

<!-- Secciones del contenido -->
@if(!empty($sections))
    @foreach($sections as $s)
        @php $secId = \Illuminate\Support\Str::slug($s['title'] ?? ('seccion-' . $loop->iteration)); @endphp
        <article id="{{ $secId }}" class="mb-12">
            <h2 class="text-3xl font-bold text-white mb-6 border-b-2 border-cyan-500 pb-3">
                {{ $s['title'] ?? 'Sección ' . $loop->iteration }}
            </h2>

            <!-- Imagen de la sección (debajo del título, antes del contenido) -->
            @php
                // Obtener imagen para esta sección específica
                $sectionImage = null;
                
                // 1) Intentar obtener imagen asignada por parseContenido
                if (isset($s['imagePath']) && !empty($s['imagePath'])) {
                    $sectionImage = $s['imagePath'];
                } elseif (isset($s['images']) && is_array($s['images']) && !empty($s['images'][0])) {
                    $sectionImage = $s['images'][0];
                }
                
                // 2) Si no hay imagen asignada, usar imagen por índice de las imágenes adicionales
                if (empty($sectionImage) && isset($casoExito)) {
                    // Ya no hay imágenes adicionales, solo usar las de Summernote
                    $sectionImage = null;
                }
            @endphp
            
            @if(!empty($sectionImage))
                @php
                    // Generar URL correcta para la imagen
                    $imageUrl = \Illuminate\Support\Str::startsWith($sectionImage, ['http://', 'https://', '/'])
                        ? $sectionImage
                        : asset('storage/' . ltrim($sectionImage, '/'));
                @endphp
                <div class="relative mb-6">
                    <div class="relative w-full h-80 flex items-center justify-center p-6 bg-gradient-to-br from-slate-800/50 to-slate-700/50 rounded-2xl border border-slate-600/30 shadow-xl">
                        <img src="{{ $imageUrl }}" 
                             alt="{{ $s['title'] ?? 'Imagen de sección' }}"
                             class="max-w-full max-h-full object-contain rounded-lg shadow-lg"
                             onerror="this.style.display='none'; this.parentElement.parentElement.style.display='none';">
                    </div>
                </div>
            @endif

            <!-- Contenido de la sección -->
            @if(!empty($s['bodyHtml']))
                <div class="prose prose-lg max-w-none prose-invert prose-headings:text-white prose-headings:font-black prose-h1:text-2xl prose-h2:text-xl prose-h3:text-lg prose-p:text-slate-200 prose-p:text-base prose-p:leading-relaxed prose-strong:text-white prose-strong:font-bold prose-a:text-cyan-400 prose-a:no-underline hover:prose-a:underline prose-code:text-pink-400 prose-code:bg-slate-700/50 prose-code:px-2 prose-code:py-1 prose-code:rounded prose-pre:bg-slate-700/50 prose-pre:border prose-pre:border-slate-600/30 prose-pre:rounded-2xl prose-blockquote:border-emerald-400 prose-blockquote:text-emerald-200 prose-blockquote:bg-emerald-500/10 prose-blockquote:rounded-2xl prose-blockquote:p-4 prose-ul:text-slate-200 prose-ol:text-slate-200 prose-li:text-base prose-li:leading-relaxed mb-8">
                    {!! $s['bodyHtml'] !!}
                </div>
            @endif
        </article>
    @endforeach
@endif
