/* Estilos específicos para vista móvil de KIBI */

/* Hero Section Mobile */
@media (max-width: 768px) {
    .kibi-hero-mobile {
        padding-top: 1rem;
        min-height: calc(100vh - 60px);
    }
    
    .kibi-hero-mobile h1 {
        font-size: 2rem;
        line-height: 1.2;
        margin-bottom: 2rem;
    }
    
    .kibi-hero-mobile .hero-buttons {
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    
    .kibi-hero-mobile .hero-buttons a {
        width: 100%;
        padding: 1rem;
        font-size: 1rem;
    }
    
    .kibi-hero-mobile .stats-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
}

/* Description Section Mobile */
@media (max-width: 768px) {
    .kibi-description-mobile {
        padding: 2rem 0;
    }
    
    .kibi-description-mobile .description-content {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
    }
    
    .kibi-description-mobile .description-buttons {
        flex-direction: column;
        gap: 1rem;
    }
    
    .kibi-description-mobile .description-buttons a {
        width: 100%;
        padding: 1rem;
    }
}

/* Features Section Mobile */
@media (max-width: 768px) {
    .kibi-features-mobile {
        padding: 2rem 0;
    }
    
    .kibi-features-mobile .features-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .kibi-features-mobile .feature-card {
        padding: 1.5rem;
    }
    
    .kibi-features-mobile .feature-card h3 {
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }
    
    .kibi-features-mobile .feature-card p {
        font-size: 0.9rem;
        line-height: 1.5;
    }
}

/* Benefits Section Mobile */
@media (max-width: 768px) {
    .kibi-benefits-mobile {
        padding: 2rem 0;
    }
    
    .kibi-benefits-mobile .benefits-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .kibi-benefits-mobile .benefit-card {
        padding: 1.5rem;
        text-align: center;
    }
    
    .kibi-benefits-mobile .benefit-card h3 {
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }
}

/* Success Stories Mobile */
@media (max-width: 768px) {
    .kibi-success-mobile {
        padding: 2rem 0;
    }
    
    .kibi-success-mobile .carousel-container {
        margin: 0 1rem;
    }
    
    .kibi-success-mobile .success-card {
        padding: 1.5rem;
        min-height: 300px;
    }
    
    .kibi-success-mobile .success-card .card-content {
        flex-direction: column;
        gap: 1.5rem;
        text-align: center;
    }
    
    .kibi-success-mobile .success-card .card-image {
        width: 100%;
        height: 200px;
    }
    
    .kibi-success-mobile .carousel-controls {
        display: none; /* Ocultar controles en móvil */
    }
    
    .kibi-success-mobile .carousel-indicators {
        margin-top: 1rem;
    }
}

/* CTA Section Mobile */
@media (max-width: 768px) {
    .kibi-cta-mobile {
        padding: 3rem 0;
    }
    
    .kibi-cta-mobile h2 {
        font-size: 2rem;
        line-height: 1.2;
        margin-bottom: 1.5rem;
    }
    
    .kibi-cta-mobile p {
        font-size: 1rem;
        margin-bottom: 2rem;
    }
    
    .kibi-cta-mobile .cta-buttons {
        flex-direction: column;
        gap: 1rem;
    }
    
    .kibi-cta-mobile .cta-buttons a {
        width: 100%;
        padding: 1rem;
        font-size: 1rem;
    }
}

/* Animaciones específicas para móvil */
@media (max-width: 768px) {
    .kibi-mobile-animate {
        animation-duration: 0.6s;
    }
    
    .kibi-mobile-hover {
        transform: none !important;
    }
    
    .kibi-mobile-hover:hover {
        transform: none !important;
    }
}

/* Optimizaciones de rendimiento para móvil */
@media (max-width: 768px) {
    .kibi-mobile-optimize {
        will-change: auto;
        transform: translateZ(0);
    }
    
    .kibi-mobile-particles {
        display: none; /* Ocultar partículas en móvil para mejor rendimiento */
    }
    
    .kibi-mobile-effects {
        opacity: 0.5; /* Reducir efectos en móvil */
    }
}
