<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Finalización - {{ $curso->titulo }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/certificados-curso-certificado.css') }}">
</head>
<body>
    <div class="certificate-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="geometric-pattern"></div>

            <div class="logo-section">
                <div class="logo-icon">
                    <span class="material-icons" style="font-size: 48px; color: white;">school</span>
    </div>
                <div class="logo-text">SOFTLINKIA</div>
                <div class="logo-subtitle">Centro de Excelencia</div>

                <div class="certificate-id">
                    <div class="certificate-id-label">ID de Certificado</div>
                    <div class="certificate-id-value">{{ $certificadoId }}</div>
                </div>

                @php
                    $qrExists = false;
                    $qrUrl = null;
                    $qrIsSvg = false;
                    if ($certificado->qr_code) {
                        $qrFullPath = storage_path('app/public/' . $certificado->qr_code);
                        $qrExists = file_exists($qrFullPath);
                        if ($qrExists) {
                            $qrUrl = asset('storage/' . $certificado->qr_code);
                            $qrIsSvg = strtolower(pathinfo($certificado->qr_code, PATHINFO_EXTENSION)) === 'svg';
                        }
                    }
                @endphp

                @if($qrExists && $qrUrl)
                <!-- QR Code Section -->
                <div style="margin-top: 30px; text-align: center;">
                    <div style="background: rgba(255, 255, 255, 0.08); border: 1.5px solid rgba(255, 255, 255, 0.15); padding: 20px; border-radius: 12px;">
                        <div style="color: rgba(255, 255, 255, 0.6); font-size: 9px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 12px;">
                            Código QR de Verificación
                        </div>
                        <div style="background: white; padding: 10px; border-radius: 8px; display: inline-block; width: 170px; height: 170px;">
                            @if($qrIsSvg)
                                @php
                                    $svgContent = file_get_contents(storage_path('app/public/' . $certificado->qr_code));
                                    if ($svgContent) {
                                        $svgContent = preg_replace('/<svg([^>]*)>/i', '<svg$1 style="width: 150px; height: 150px;" preserveAspectRatio="xMidYMid meet">', $svgContent);
                                    }
                                @endphp
                                @if($svgContent)
                                    {!! $svgContent !!}
                                @else
                                    <div style="color:#9ca3af;">Error al cargar QR</div>
                                @endif
                            @else
                                <img src="{{ $qrUrl }}?v={{ time() }}"
                                     alt="QR Code"
                                     style="width: 150px; height: 150px; display: block; object-fit: contain;"
                                     onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='block';">
                                <div style="display:none; color:#9ca3af;">Error al cargar QR</div>
                            @endif
                        </div>
                        <div style="color: rgba(255, 255, 255, 0.5); font-size: 8px; margin-top: 10px; text-align: center;">
                            Escanea para verificar
                        </div>
                    </div>
                </div>
                @else
                <div style="margin-top: 30px; text-align: center;">
                    <div style="background: rgba(255, 255, 255, 0.08); border: 1.5px solid rgba(255, 255, 255, 0.15); padding: 20px; border-radius: 12px;">
                        <div style="color: rgba(255, 255, 255, 0.6); font-size: 9px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 12px;">
                            QR no disponible
                        </div>
                        <div style="color: rgba(255, 255, 255, 0.5); font-size: 10px;">
                            Regenera el código desde la página de verificación.
                        </div>
                        <form action="{{ route('certificados.regenerar-qr', $certificado->codigo_unico) }}" method="POST" style="margin-top: 12px;">
                            @csrf
                            <button type="submit" style="padding:8px 16px; background:#3b82f6; border:none; border-radius:6px; color:white; font-size:12px; cursor:pointer;">
                                Regenerar QR
                            </button>
                        </form>
                    </div>
                </div>
                @endif
            </div>

            <!-- Certificate Type Badge -->
            <div style="position: relative; z-index: 10;">
                <div style="background: rgba(255, 255, 255, 0.1); border-left: 4px solid white; padding: 20px; border-radius: 8px;">
                    <div style="color: white; font-size: 28px; font-weight: 900; margin-bottom: 8px;">CERTIFICADO</div>
                    <div style="color: rgba(255, 255, 255, 0.8); font-size: 12px; font-weight: 600;">Acreditación Profesional</div>
                    <div style="color: rgba(255, 255, 255, 0.6); font-size: 11px; margin-top: 8px;">Verificado digitalmente</div>
                </div>
                </div>
            </div>

            <!-- Main Content -->
        <div class="main-content">
            <div class="acknowledge-text">Se certifica que</div>

            <div class="underline"></div>

            <h2 class="student-name">
                        {{ $usuario->name }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}
                    </h2>

            <div class="underline"></div>

            <p class="cert-statement">ha completado exitosamente el curso de</p>

            <div class="cert-title">{{ strtoupper($curso->titulo) }}</div>

            <p class="cert-subtitle">{{ $curso->categoria->nombre ?? 'General' }} - Nivel {{ ucfirst($nivelDificultad) }}</p>

            <p class="cert-description">
                cumpliendo con todos los requisitos y criterios para esta certificación a través de entrenamiento y evaluación administrada por SoftLinkIA.
            </p>

            <div class="date-section">
                <div class="date-label">Esta certificación fue obtenida el</div>
                <div class="date-value">{{ \Carbon\Carbon::parse($fechaFinalizacion)->locale('es')->translatedFormat('j \d\e F \d\e Y') }}</div>
                    </div>

            <!-- Stats -->
            <div class="stats-section">
                <div class="stat-item">
                    <div class="stat-label">Progreso</div>
                    <div class="stat-value">100%</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Duración</div>
                    <div class="stat-value">{{ $curso->duracion_horas }}h</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Lecciones</div>
                    <div class="stat-value">{{ $totalLecciones }}</div>
                </div>
                        </div>

            <!-- Signatures -->
            <div class="signatures-section">
                <div class="signature">
                    <div class="signature-line"></div>
                    <div class="signature-name">
                        {{ optional($curso->creador)->name ?? 'SoftLinkIA' }} {{ optional($curso->creador)->apellido_paterno ?? '' }}
                    </div>
                    <div class="signature-title">Instructor del Curso</div>
            </div>

                <div class="signature">
                    <div class="signature-line"></div>
                    <div class="signature-name">SoftLinkIA</div>
                    <div class="signature-title">Director Ejecutivo</div>
                </div>
                </div>
            </div>
        </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
        <button class="btn btn-print" onclick="window.print()">
            <span class="material-icons" style="font-size: 18px;">print</span>
                Imprimir Certificado
            </button>
        <button class="btn btn-pdf" onclick="downloadPDF()">
            <span class="material-icons" style="font-size: 18px;">download</span>
                Descargar PDF
            </button>
    </div>

    <script>
        function downloadPDF() {
            window.location.href = '{{ route("certificados.descargar", $certificado) }}';
        }
    </script>
</body>
</html>
