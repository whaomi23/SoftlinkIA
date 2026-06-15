/* Estilos específicos para vista de escritorio de KIBI */

/* Hero Section Desktop */
@media (min-width: 1024px) {
    .kibi-hero-desktop {
        padding-top: 2rem;
        min-height: calc(100vh - 80px);
    }
    
    .kibi-hero-desktop h1 {
        font-size: 4rem;
        line-height: 1.1;
        margin-bottom: 4rem;
    }
    
    .kibi-hero-desktop .hero-buttons {
        flex-direction: row;
        gap: 2rem;
        margin-bottom: 4rem;
    }
    
    .kibi-hero-desktop .hero-buttons a {
        padding: 1.5rem 2rem;
        font-size: 1.25rem;
    }
    
    .kibi-hero-desktop .stats-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 3rem;
    }
    
    .kibi-hero-desktop .stats-grid .stat-item {
        font-size: 3rem;
    }
}

/* Description Section Desktop */
@media (min-width: 1024px) {
    .kibi-description-desktop {
        padding: 4rem 0;
    }
    
    .kibi-description-desktop .description-content {
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }
    
    .kibi-description-desktop .description-text {
        text-align: left;
    }
    
    .kibi-description-desktop .description-text h2 {
        font-size: 3rem;
        margin-bottom: 2rem;
    }
    
    .kibi-description-desktop .description-text p {
        font-size: 1.25rem;
        margin-bottom: 2rem;
    }
    
    .kibi-description-desktop .description-buttons {
        flex-direction: row;
        gap: 2rem;
    }
    
    .kibi-description-desktop .description-buttons a {
        padding: 1.5rem 2rem;
    }
    
    .kibi-description-desktop .description-card {
        padding: 3rem;
    }
}

/* Features Section Desktop */
@media (min-width: 1024px) {
    .kibi-features-desktop {
        padding: 4rem 0;
    }
    
    .kibi-features-desktop .features-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }
    
    .kibi-features-desktop .feature-card {
        padding: 3rem;
        min-height: 400px;
    }
    
    .kibi-features-desktop .feature-card h3 {
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
    }
    
    .kibi-features-desktop .feature-card p {
        font-size: 1.1rem;
        line-height: 1.6;
    }
    
    .kibi-features-desktop .feature-card:hover {
        transform: translateY(-10px) scale(1.02);
    }
}

/* Benefits Section Desktop */
@media (min-width: 1024px) {
    .kibi-benefits-desktop {
        padding: 4rem 0;
    }
    
    .kibi-benefits-desktop .benefits-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }
    
    .kibi-benefits-desktop .benefit-card {
        padding: 3rem;
        text-align: center;
        min-height: 350px;
    }
    
    .kibi-benefits-desktop .benefit-card h3 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .kibi-benefits-desktop .benefit-card:hover {
        transform: translateY(-8px) scale(1.02);
    }
}

/* Success Stories Desktop */
@media (min-width: 1024px) {
    .kibi-success-desktop {
        padding: 4rem 0;
    }
    
    .kibi-success-desktop .carousel-container {
        margin: 0 4rem;
    }
    
    .kibi-success-desktop .success-card {
        padding: 3rem;
        min-height: 400px;
    }
    
    .kibi-success-desktop .success-card .card-content {
        flex-direction: row;
        gap: 3rem;
        align-items: center;
    }
    
    .kibi-success-desktop .success-card .card-text {
        text-align: left;
        flex: 1;
    }
    
    .kibi-success-desktop .success-card .card-image {
        width: 300px;
        height: 300px;
        flex-shrink: 0;
    }
    
    .kibi-success-desktop .carousel-controls {
        display: flex;
    }
    
    .kibi-success-desktop .carousel-controls button {
        width: 3rem;
        height: 3rem;
        font-size: 1.5rem;
    }
    
    .kibi-success-desktop .carousel-indicators {
        margin-top: 2rem;
    }
}

/* CTA Section Desktop */
@media (min-width: 1024px) {
    .kibi-cta-desktop {
        padding: 6rem 0;
    }
    
    .kibi-cta-desktop h2 {
        font-size: 4rem;
        line-height: 1.1;
        margin-bottom: 2rem;
    }
    
    .kibi-cta-desktop p {
        font-size: 1.5rem;
        margin-bottom: 3rem;
    }
    
    .kibi-cta-desktop .cta-buttons {
        flex-direction: row;
        gap: 2rem;
    }
    
    .kibi-cta-desktop .cta-buttons a {
        padding: 1.5rem 2rem;
        font-size: 1.25rem;
    }
}

/* Efectos avanzados para escritorio */
@media (min-width: 1024px) {
    .kibi-desktop-effects {
        position: relative;
        overflow: hidden;
    }
    
    .kibi-desktop-effects::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        transition: left 0.5s;
    }
    
    .kibi-desktop-effects:hover::before {
        left: 100%;
    }
    
    .kibi-desktop-particles {
        display: block;
    }
    
    .kibi-desktop-glow {
        box-shadow: 0 0 30px rgba(34, 211, 238, 0.3);
    }
    
    .kibi-desktop-glow:hover {
        box-shadow: 0 0 50px rgba(34, 211, 238, 0.5);
    }
}

/* Animaciones específicas para escritorio */
@media (min-width: 1024px) {
    .kibi-desktop-animate {
        animation-duration: 0.8s;
    }
    
    .kibi-desktop-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .kibi-desktop-hover:hover {
        transform: translateY(-5px) scale(1.02);
    }
    
    .kibi-desktop-parallax {
        transform: translateZ(0);
        will-change: transform;
    }
}

/* Optimizaciones de rendimiento para escritorio */
@media (min-width: 1024px) {
    .kibi-desktop-optimize {
        will-change: transform;
        transform: translateZ(0);
    }
    
    .kibi-desktop-gpu {
        transform: translate3d(0, 0, 0);
        backface-visibility: hidden;
        perspective: 1000px;
    }
}

/* Efectos de scroll para escritorio */
@media (min-width: 1024px) {
    .kibi-scroll-reveal {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .kibi-scroll-reveal.revealed {
        opacity: 1;
        transform: translateY(0);
    }
}
