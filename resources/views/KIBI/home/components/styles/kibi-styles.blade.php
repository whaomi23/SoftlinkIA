/* Estilos principales para KIBI Business Intelligence */

/* Incluir fuentes Piala */
@include('KIBI.home.components.styles.piala-fonts')

/* Variables CSS para KIBI - Colores Educativos */
:root {
    --kibi-primary: #22c55e;        /* Verde educativo */
    --kibi-secondary: #f59e0b;      /* Amarillo educativo */
    --kibi-accent: #f97316;         /* Naranja educativo */
    --kibi-success: #10b981;        /* Verde éxito */
    --kibi-warning: #eab308;         /* Amarillo advertencia */
    --kibi-danger: #ef4444;          /* Rojo */
    --kibi-info: #3b82f6;           /* Azul información */
    --kibi-purple: #8b5cf6;         /* Morado educativo */
    --kibi-pink: #ec4899;           /* Rosa educativo */
    --kibi-dark: #1e3a8a;          /* Azul oscuro educativo */
    --kibi-light: #f0f9ff;          /* Azul muy claro */
    --kibi-gradient-start: #22c55e;  /* Verde */
    --kibi-gradient-end: #f59e0b;   /* Amarillo */
    --kibi-text-primary: #1f2937;
    --kibi-text-secondary: #374151;
    --kibi-bg-primary: #1e3a8a;     /* Azul educativo */
    --kibi-bg-secondary: #2563eb;   /* Azul medio */
    --kibi-bg-tertiary: #3b82f6;    /* Azul claro */
}



/* Efectos de partículas unificados */
.unified-particles-container {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
}

.unified-particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: linear-gradient(45deg, var(--kibi-primary), var(--kibi-secondary));
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.unified-particle:nth-child(1) {
    top: 20%;
    left: 20%;
    animation-delay: 0s;
}

.unified-particle:nth-child(2) {
    top: 40%;
    right: 30%;
    animation-delay: 2s;
}

.unified-particle:nth-child(3) {
    bottom: 30%;
    left: 40%;
    animation-delay: 4s;
}

.unified-particle:nth-child(4) {
    top: 60%;
    right: 20%;
    animation-delay: 1s;
}

.unified-particle:nth-child(5) {
    bottom: 20%;
    right: 50%;
    animation-delay: 3s;
}

.unified-particle:nth-child(6) {
    top: 30%;
    left: 60%;
    animation-delay: 5s;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
        opacity: 0.7;
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
        opacity: 1;
    }
}

/* Efectos de gradiente animado */
.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 3s ease infinite;
}

@keyframes gradient-x {
    0%, 100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
}

/* Efectos de brillo */
.animate-shimmer {
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}

/* Botones de neón */
.neon-button-primary {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    font-weight: 700;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.neon-button-primary:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 20px 40px rgba(6, 182, 212, 0.4);
}

.neon-button-secondary {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    font-weight: 700;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.neon-button-secondary:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 20px 40px rgba(99, 102, 241, 0.4);
}

/* Tarjetas de servicio */
.service-card-modern {
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.6));
    border: 1px solid rgba(148, 163, 184, 0.1);
    backdrop-filter: blur(10px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.service-card-modern:hover {
    transform: translateY(-8px) scale(1.02);
    border-color: rgba(6, 182, 212, 0.3);
    box-shadow: 0 25px 50px rgba(6, 182, 212, 0.2);
}

/* Variantes de tarjetas */
.service-card-cyan {
    border-left: 4px solid var(--kibi-primary);
}

.service-card-blue {
    border-left: 4px solid var(--kibi-secondary);
}

.service-card-indigo {
    border-left: 4px solid var(--kibi-accent);
}

.service-card-purple {
    border-left: 4px solid #8b5cf6;
}

.service-card-red {
    border-left: 4px solid var(--kibi-danger);
}

.service-card-orange {
    border-left: 4px solid var(--kibi-warning);
}

/* Secciones unificadas */
.unified-section-primary {
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
    position: relative;
}

.unified-section-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(6, 182, 212, 0.05), transparent);
    pointer-events: none;
}

.unified-section-secondary {
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.95), rgba(51, 65, 85, 0.9));
    position: relative;
}

.unified-section-secondary::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(59, 130, 246, 0.05), transparent);
    pointer-events: none;
}

/* Efectos de brillo unificados */
.unified-glow-effect {
    text-shadow: 0 0 20px rgba(6, 182, 212, 0.5);
}

/* Grid de servicios */
.services-grid {
    display: grid;
    gap: 2rem;
}

/* Responsive Grid */
@media (min-width: 768px) {
    .services-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .services-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Carrusel de casos de éxito */
.success-story-card {
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.8), rgba(51, 65, 85, 0.6));
    border: 1px solid rgba(148, 163, 184, 0.1);
    backdrop-filter: blur(10px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.success-story-card:hover {
    transform: translateY(-5px) scale(1.01);
    border-color: rgba(6, 182, 212, 0.3);
    box-shadow: 0 20px 40px rgba(6, 182, 212, 0.15);
}

/* Controles del carrusel */
.carousel-controls button {
    background: rgba(30, 41, 59, 0.8);
    border: 1px solid rgba(148, 163, 184, 0.2);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.carousel-controls button:hover {
    background: rgba(30, 41, 59, 0.9);
    border-color: var(--kibi-primary);
    transform: scale(1.1);
}

/* Indicadores del carrusel */
.carousel-indicators button {
    transition: all 0.3s ease;
}

.carousel-indicators button:hover {
    transform: scale(1.25);
}

/* Efectos de partículas para CTA */
.particles-container {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
}

.particle {
    position: absolute;
    width: 2px;
    height: 2px;
    background: var(--kibi-primary);
    border-radius: 50%;
    animation: particle-float 8s linear infinite;
}

.particle-1 {
    top: 10%;
    left: 10%;
    animation-delay: 0s;
}

.particle-2 {
    top: 20%;
    right: 20%;
    animation-delay: 2s;
}

.particle-3 {
    bottom: 30%;
    left: 30%;
    animation-delay: 4s;
}

.particle-4 {
    top: 60%;
    right: 40%;
    animation-delay: 6s;
}

.particle-5 {
    bottom: 20%;
    right: 60%;
    animation-delay: 1s;
}

.particle-6 {
    top: 40%;
    left: 70%;
    animation-delay: 3s;
}

@keyframes particle-float {
    0% {
        transform: translateY(0px) rotate(0deg);
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        transform: translateY(-100px) rotate(360deg);
        opacity: 0;
    }
}

/* Estilos adicionales para KIBI */
