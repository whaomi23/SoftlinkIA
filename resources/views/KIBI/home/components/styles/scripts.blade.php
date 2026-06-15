<!-- JavaScript para KIBI Business Intelligence -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Slider del encabezado
    const headerSlider = document.getElementById('header-slider');
    const sliderDots = document.querySelectorAll('.slider-dot');
    const prevSlideBtn = document.getElementById('prev-slide');
    const nextSlideBtn = document.getElementById('next-slide');
    
    let currentSlide = 0;
    const totalSlides = 3;
    
    function showSlide(index) {
        if (headerSlider) {
            headerSlider.style.transform = `translateX(-${index * 100}%)`;
        }
        
        sliderDots.forEach((dot, i) => {
            dot.classList.toggle('bg-sky-400', i === index);
            dot.classList.toggle('bg-slate-600', i !== index);
        });
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }
    
    // Event listeners para el slider del encabezado
    if (nextSlideBtn) nextSlideBtn.addEventListener('click', nextSlide);
    if (prevSlideBtn) prevSlideBtn.addEventListener('click', prevSlide);
    
    sliderDots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });
    
    // Auto-play del slider
    setInterval(nextSlide, 6000);
    
    // Menú móvil
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Animaciones de contadores
    const counters = document.querySelectorAll('[data-counter]');
    const bars = document.querySelectorAll('[data-width]');
    
    function animateCounters() {
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-counter'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current);
            }, 16);
        });
    }
    
    function animateBars() {
        bars.forEach(bar => {
            const width = bar.getAttribute('data-width');
            setTimeout(() => {
                bar.style.width = width + '%';
            }, 500);
        });
    }
    
    // Intersection Observer para animaciones
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains('statistics-section')) {
                    animateCounters();
                    animateBars();
                }
            }
        });
    }, observerOptions);
    
    // Observar secciones que necesitan animación
    const statisticsSection = document.querySelector('.statistics-section');
    if (statisticsSection) {
        observer.observe(statisticsSection);
    }
    
    // Smooth scrolling para enlaces de navegación
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Formulario de contacto (solo para formularios que no sean de autenticación)
    const contactForm = document.querySelector('form:not([action*="login"]):not([action*="register"]):not([action*="password"])');
    if (contactForm && !contactForm.action.includes('kibi')) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simular envío del formulario
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Enviando...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                submitBtn.textContent = '¡Mensaje Enviado!';
                submitBtn.classList.remove('from-sky-500', 'to-blue-600');
                submitBtn.classList.add('from-green-500', 'to-green-600');
                
                setTimeout(() => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('from-green-500', 'to-green-600');
                    submitBtn.classList.add('from-sky-500', 'to-blue-600');
                    this.reset();
                }, 3000);
            }, 2000);
        });
    }
    
    // Newsletter
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[type="email"]').value;
            const button = this.querySelector('button');
            const originalText = button.textContent;
            
            button.textContent = 'Suscribiendo...';
            button.disabled = true;
            
            setTimeout(() => {
                button.textContent = '¡Suscrito!';
                button.classList.remove('from-sky-500', 'to-blue-600');
                button.classList.add('from-green-500', 'to-green-600');
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.disabled = false;
                    button.classList.remove('from-green-500', 'to-green-600');
                    button.classList.add('from-sky-500', 'to-blue-600');
                    this.reset();
                }, 3000);
            }, 1500);
        });
    }
    
    // Header flotante que aparece al hacer scroll hacia arriba
    let lastScrollTop = 0;
    let isScrollingUp = false;
    const floatingHeader = document.getElementById('floating-header');
    const mainHeader = document.getElementById('main-header');
    
    function handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const scrollThreshold = 100; // Aparece después de 100px de scroll
        
        // Siempre ocultar si estamos en la parte superior
        if (scrollTop <= scrollThreshold) {
            if (floatingHeader) {
                floatingHeader.classList.add('-translate-y-full');
                floatingHeader.classList.remove('translate-y-0');
            }
            lastScrollTop = scrollTop;
            return; // Salir temprano para evitar lógica adicional
        }
        
        // Detectar dirección del scroll solo si estamos por encima del threshold
        if (scrollTop > lastScrollTop) {
            // Scrolling hacia abajo
            isScrollingUp = false;
            if (floatingHeader) {
                floatingHeader.classList.add('-translate-y-full');
                floatingHeader.classList.remove('translate-y-0');
            }
        } else if (scrollTop < lastScrollTop) {
            // Scrolling hacia arriba
            isScrollingUp = true;
            if (floatingHeader) {
                floatingHeader.classList.remove('-translate-y-full');
                floatingHeader.classList.add('translate-y-0');
            }
        }
        
        lastScrollTop = scrollTop;
    }
    
    // Throttle del scroll para mejor rendimiento
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }
        scrollTimeout = setTimeout(handleScroll, 10);
    });
    
    // Inicializar
    showSlide(0);

    // Animación de ornamentos dependiente del scroll (izq/der + fade)
    const ornaments = Array.from(document.querySelectorAll('.scroll-ornament'));
    if (ornaments.length) {
        ornaments.forEach(el => {
            const distance = parseFloat(el.getAttribute('data-distance')) || 120;
            const dir = (el.getAttribute('data-direction') || 'left').toLowerCase();
            const sign = dir === 'right' ? -1 : 1; // iniciar fuera hacia el lado indicado
            el.style.opacity = '0';
            el.style.transform += ` translateX(${sign * distance}px)`;
        });

        const clamp = (n, min, max) => Math.max(min, Math.min(max, n));
        const easeOut = t => 1 - Math.pow(1 - t, 3);

        let ticking = false;
        function updateOrnaments() {
            const vh = window.innerHeight;
            const viewportCenter = window.scrollY + vh / 2;

            ornaments.forEach(el => {
                const rect = el.getBoundingClientRect();
                const elCenter = window.scrollY + rect.top + rect.height / 2;
                const distanceAttr = parseFloat(el.getAttribute('data-distance')) || 120;
                const dir = (el.getAttribute('data-direction') || 'left').toLowerCase();
                const sign = dir === 'right' ? -1 : 1;

                // progreso 0..1 basado en cercanía al centro del viewport
                const norm = Math.abs(elCenter - viewportCenter) / (vh * 0.6);
                const progress = clamp(1 - norm, 0, 1);
                const eased = easeOut(progress);
                const tx = sign * (1 - eased) * distanceAttr;

                el.style.transform = el.style.transform.replace(/translateX\([^\)]*\)/, '').trim();
                el.style.transform += ` translateX(${tx}px)`;
                el.style.opacity = String(eased);
            });
            ticking = false;
        }

        function onScroll() {
            if (!ticking) {
                window.requestAnimationFrame(updateOrnaments);
                ticking = true;
            }
        }

        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll);
        updateOrnaments();
    }
});
</script>