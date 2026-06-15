/* Fuentes Piala - Utilidades CSS para KIBI */

/* Definición de fuentes Piala */
@font-face {
    font-family: 'Piala';
    src: url('/kibbi-fonts/Piala/Web-PS/Piala-Regular.woff2') format('woff2'),
         url('/kibbi-fonts/Piala/Web-TT/Piala-Regular.woff') format('woff'),
         url('/kibbi-fonts/Piala/OpenType-PS/Piala-Regular.otf') format('opentype'),
         url('/kibbi-fonts/Piala/OpenType-TT/Piala-Regular.ttf') format('truetype');
    font-weight: 400;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Piala';
    src: url('/kibbi-fonts/Piala/Web-PS/Piala-Italic.woff2') format('woff2'),
         url('/kibbi-fonts/Piala/Web-TT/Piala-Italic.woff') format('woff'),
         url('/kibbi-fonts/Piala/OpenType-PS/Piala-Italic.otf') format('opentype'),
         url('/kibbi-fonts/Piala/OpenType-TT/Piala-Italic.ttf') format('truetype');
    font-weight: 400;
    font-style: italic;
    font-display: swap;
}

@font-face {
    font-family: 'Piala Outline';
    src: url('/kibbi-fonts/Piala/Web-PS/Piala-Outline.woff2') format('woff2'),
         url('/kibbi-fonts/Piala/Web-TT/Piala-Outline.woff') format('woff'),
         url('/kibbi-fonts/Piala/OpenType-PS/Piala-Outline.otf') format('opentype'),
         url('/kibbi-fonts/Piala/OpenType-TT/Piala-Outline.ttf') format('truetype');
    font-weight: 400;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Piala Outline';
    src: url('/kibbi-fonts/Piala/Web-PS/Piala-OutlineItalic.woff2') format('woff2'),
         url('/kibbi-fonts/Piala/Web-TT/Piala-OutlineItalic.woff') format('woff'),
         url('/kibbi-fonts/Piala/OpenType-PS/Piala-OutlineItalic.otf') format('opentype'),
         url('/kibbi-fonts/Piala/OpenType-TT/Piala-OutlineItalic.ttf') format('truetype');
    font-weight: 400;
    font-style: italic;
    font-display: swap;
}

/* Clases utilitarias para fuentes Piala */
.font-piala {
    font-family: 'Piala', sans-serif;
}

.font-piala-italic {
    font-family: 'Piala', sans-serif;
    font-style: italic;
}

.font-piala-outline {
    font-family: 'Piala Outline', sans-serif;
}

.font-piala-outline-italic {
    font-family: 'Piala Outline', sans-serif;
    font-style: italic;
}

/* Aplicación automática de fuentes Piala */
body {
    font-family: 'Piala', 'Inter', sans-serif;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Piala', 'Poppins', sans-serif;
    font-weight: 600;
}

/* Títulos principales con fuente outline para mayor impacto */
.hero-title, 
.section-title,
.main-title,
.page-title {
    font-family: 'Piala Outline', 'Piala', sans-serif;
    font-weight: 400;
}

/* Textos especiales con cursiva */
.accent-text, 
.highlight-text,
.emphasis-text {
    font-family: 'Piala', sans-serif;
    font-style: italic;
}

/* Estilos específicos para diferentes tamaños de texto */
.text-piala-xs {
    font-family: 'Piala', sans-serif;
    font-size: 0.75rem;
    line-height: 1rem;
}

.text-piala-sm {
    font-family: 'Piala', sans-serif;
    font-size: 0.875rem;
    line-height: 1.25rem;
}

.text-piala-base {
    font-family: 'Piala', sans-serif;
    font-size: 1rem;
    line-height: 1.5rem;
}

.text-piala-lg {
    font-family: 'Piala', sans-serif;
    font-size: 1.125rem;
    line-height: 1.75rem;
}

.text-piala-xl {
    font-family: 'Piala', sans-serif;
    font-size: 1.25rem;
    line-height: 1.75rem;
}

.text-piala-2xl {
    font-family: 'Piala', sans-serif;
    font-size: 1.5rem;
    line-height: 2rem;
}

.text-piala-3xl {
    font-family: 'Piala Outline', sans-serif;
    font-size: 1.875rem;
    line-height: 2.25rem;
}

.text-piala-4xl {
    font-family: 'Piala Outline', sans-serif;
    font-size: 2.25rem;
    line-height: 2.5rem;
}

.text-piala-5xl {
    font-family: 'Piala Outline', sans-serif;
    font-size: 3rem;
    line-height: 1;
}

.text-piala-6xl {
    font-family: 'Piala Outline', sans-serif;
    font-size: 3.75rem;
    line-height: 1;
}

.text-piala-7xl {
    font-family: 'Piala Outline', sans-serif;
    font-size: 4.5rem;
    line-height: 1;
}

.text-piala-8xl {
    font-family: 'Piala Outline', sans-serif;
    font-size: 6rem;
    line-height: 1;
}

.text-piala-9xl {
    font-family: 'Piala Outline', sans-serif;
    font-size: 8rem;
    line-height: 1;
}

/* Estilos para botones con fuentes Piala */
.btn-piala {
    font-family: 'Piala', sans-serif;
    font-weight: 600;
}

.btn-piala-outline {
    font-family: 'Piala Outline', sans-serif;
    font-weight: 400;
}

/* Estilos para formularios */
.form-label-piala {
    font-family: 'Piala', sans-serif;
    font-weight: 500;
}

.form-input-piala {
    font-family: 'Piala', sans-serif;
}

/* Estilos para navegación */
.nav-link-piala {
    font-family: 'Piala', sans-serif;
    font-weight: 500;
}

.nav-title-piala {
    font-family: 'Piala Outline', sans-serif;
    font-weight: 400;
}

/* Estilos para cards y componentes */
.card-title-piala {
    font-family: 'Piala Outline', sans-serif;
    font-weight: 400;
}

.card-text-piala {
    font-family: 'Piala', sans-serif;
}

/* Estilos para testimonios y citas */
.testimonial-text-piala {
    font-family: 'Piala', sans-serif;
    font-style: italic;
}

.testimonial-author-piala {
    font-family: 'Piala', sans-serif;
    font-weight: 600;
}

/* Estilos para precios y números */
.price-piala {
    font-family: 'Piala Outline', sans-serif;
    font-weight: 400;
}

.number-piala {
    font-family: 'Piala Outline', sans-serif;
    font-weight: 400;
}

/* Estilos responsivos */
@media (max-width: 640px) {
    .text-piala-9xl {
        font-size: 4rem;
    }
    
    .text-piala-8xl {
        font-size: 3rem;
    }
    
    .text-piala-7xl {
        font-size: 2.5rem;
    }
    
    .text-piala-6xl {
        font-size: 2rem;
    }
}

/* Efectos especiales para fuentes Piala */
.text-piala-glow {
    font-family: 'Piala Outline', sans-serif;
    text-shadow: 0 0 10px rgba(2, 175, 201, 0.5);
}

.text-piala-shadow {
    font-family: 'Piala', sans-serif;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.text-piala-gradient {
    font-family: 'Piala Outline', sans-serif;
    background: linear-gradient(135deg, #02AFC9, #6D9F3E);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
