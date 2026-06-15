// Matrix rain background
(function(){
    const canvas = document.getElementById('matrix-canvas');
    if(!canvas) return;
    const ctx = canvas.getContext('2d');
    let w, h, dpr; let columns; let drops;

    const glyphs = 'アカサタナハマヤラワ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let phraseColumns = [];

    function resize(){
        dpr = window.devicePixelRatio || 1;
        w = canvas.clientWidth; h = canvas.clientHeight;
        canvas.width = w * dpr; canvas.height = h * dpr; ctx.setTransform(dpr,0,0,dpr,0,0);
        const fontSize = 14; columns = Math.floor(w / fontSize); drops = new Array(columns).fill(1);
        ctx.font = `${fontSize}px monospace`;
    }
    resize();
    window.addEventListener('resize', resize, { passive:true });

    function step(){
        ctx.fillStyle = 'rgba(15, 23, 42, 0.12)';
        ctx.fillRect(0, 0, w, h);

        for (let i = 0; i < drops.length; i++) {
            const text = glyphs[Math.floor(Math.random() * glyphs.length)];
            const x = i * 14; const y = drops[i] * 14;
            ctx.fillStyle = 'rgba(34, 211, 238, .6)';
            ctx.fillText(text, x, y);
            if (y > h && Math.random() > 0.975) drops[i] = 0;
            drops[i]++;
        }
        requestAnimationFrame(step);
    }
    step();
})();

// Tilt cards effect
(function(){
    const tilts = document.querySelectorAll('.tilt-card');
    tilts.forEach(card => {
        card.addEventListener('mousemove', (e)=>{
            const r = card.getBoundingClientRect();
            const x = e.clientX - (r.left + r.width/2);
            const y = e.clientY - (r.top + r.height/2);
            const rx = (y / r.height) * -10;
            const ry = (x / r.width) * 10;
            card.style.transform = `perspective(900px) rotateX(${rx}deg) rotateY(${ry}deg)`;
        });
        card.addEventListener('mouseleave', ()=>{
            card.style.transform = 'perspective(900px) rotateX(0deg) rotateY(0deg)';
        });
    });

    // Reveal on scroll
    const observer = new IntersectionObserver((entries)=>{
        entries.forEach(ent => {
            if (ent.isIntersecting) {
                ent.target.classList.add('is-visible');
                observer.unobserve(ent.target);
            }
        });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
})();

// Funciones para incrementar/decrementar cantidad
function incrementQuantity(button) {
    const input = button.parentElement.querySelector('input[type="number"]');
    const currentValue = parseInt(input.value) || 1;
    input.value = currentValue + 1;
    input.dispatchEvent(new Event('change', { bubbles: true }));
}

function decrementQuantity(button) {
    const input = button.parentElement.querySelector('input[type="number"]');
    const currentValue = parseInt(input.value) || 1;
    if (currentValue > 1) {
        input.value = currentValue - 1;
        input.dispatchEvent(new Event('change', { bubbles: true }));
    }
}

// PayPal Integration
let paypalButtons;

document.addEventListener('DOMContentLoaded', function() {
    const paymentForm = document.getElementById('payment-form');
    const paymentButton = document.getElementById('payment-button');
    const paypalContainer = document.getElementById('paypal-button-container');
    const paypalLoadingButton = document.getElementById('paypal-loading-button');

    // Inicializar PayPal Buttons
    if (typeof paypal !== 'undefined' && paypalContainer) {
        paypalLoadingButton.style.display = 'none';

        paypalButtons = paypal.Buttons({
            style: {
                layout: 'vertical',
                color: 'blue',
                shape: 'rect',
                label: 'paypal',
                height: 55,
                tagline: false
            },
            fundingSource: undefined,
            enableStandardCardFields: false,
            createOrder: async function(data, actions) {
                try {
                    const response = await fetch(window.PAYPAL_CREATE_ORDER_URL, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });

                    const orderData = await response.json();

                    if (!response.ok) {
                        throw new Error(orderData.message || 'Error al crear la orden');
                    }

                    if (orderData.success && orderData.order_id) {
                        return orderData.order_id;
                    } else {
                        throw new Error(orderData.message || 'No se recibió un order_id válido');
                    }
                } catch (error) {
                    console.error('Error creando orden PayPal:', error);
                    showErrorModal('Error al crear la orden de pago: ' + error.message);
                    throw error;
                }
            },
            onApprove: async function(data, actions) {
                try {
                    showLoadingModal('Procesando tu pago...');

                    const response = await fetch(window.PAYPAL_CAPTURE_URL, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            orderID: data.orderID
                        })
                    });

                    const captureData = await response.json();

                    if (response.ok && captureData.success) {
                        window.location.href = window.PAYPAL_SUCCESS_URL;
                    } else {
                        throw new Error(captureData.message || 'Error al procesar el pago');
                    }
                } catch (error) {
                    console.error('Error capturando pago:', error);
                    hideLoadingModal();
                    showErrorModal('Error al procesar el pago: ' + error.message);
                }
            },
            onError: function(err) {
                console.error('Error en PayPal:', err);
                showErrorModal('Ocurrió un error con PayPal. Por favor, intenta de nuevo.');
            },
            onCancel: function(data) {
                showInfoModal('Pago cancelado', 'Has cancelado el proceso de pago. Puedes intentar de nuevo cuando quieras.');
            }
        });

        paypalButtons.render('#paypal-button-container').then(() => {
            console.log('✅ PayPal buttons rendered successfully');

            if (paypalContainer) {
                paypalContainer.classList.add('paypal-loaded');
            }

            function attachCardButtonListener() {
                const paypalCardButton = paypalContainer?.querySelector('[data-funding-source="card"]');

                if (paypalCardButton && !paypalCardButton.hasAttribute('data-stripe-listener')) {
                    paypalCardButton.setAttribute('data-stripe-listener', 'true');

                    const handleCardClick = (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        e.stopImmediatePropagation();

                        paypalCardButton.style.transform = 'scale(0.98)';
                        setTimeout(() => {
                            paypalCardButton.style.transform = '';
                            openStripeModal();
                        }, 150);

                        return false;
                    };

                    paypalCardButton.addEventListener('click', handleCardClick, { capture: true, once: false });
                    paypalCardButton.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter' || e.key === ' ') {
                            handleCardClick(e);
                        }
                    }, { capture: true });

                    paypalCardButton.style.cursor = 'pointer';
                    paypalCardButton.setAttribute('title', 'Pagar con tarjeta a través de Stripe');
                    paypalCardButton.setAttribute('aria-label', 'Pagar con tarjeta a través de Stripe');

                    console.log('✅ PayPal card button listener attached');
                    return true;
                }
                return false;
            }

            const observer = new MutationObserver((mutations) => {
                mutations.forEach(() => {
                    attachCardButtonListener();
                });
            });

            if (paypalContainer) {
                observer.observe(paypalContainer, {
                    childList: true,
                    subtree: true,
                    attributes: false
                });
            }

            attachCardButtonListener();
            setTimeout(() => {
                if (attachCardButtonListener()) {
                    observer.disconnect();
                }
            }, 300);

            setTimeout(() => {
                observer.disconnect();
            }, 5000);

        }).catch((error) => {
            console.error('Error rendering PayPal buttons:', error);
            paypalLoadingButton.style.display = 'flex';
            paypalLoadingButton.innerHTML = `
                <span class="material-icons text-sm mr-2">error</span>
                Error al cargar PayPal
            `;
            paypalLoadingButton.disabled = false;
            paypalLoadingButton.onclick = () => {
                window.location.reload();
            };
        });
    } else {
        console.error('PayPal SDK no está disponible');
        paypalLoadingButton.style.display = 'flex';
        paypalLoadingButton.innerHTML = `
            <span class="material-icons text-sm mr-2">error</span>
            PayPal no disponible
        `;
    }

    // Stripe payment form handler
    if (paymentForm && paymentButton) {
        paymentForm.addEventListener('submit', function(e) {
            const submitText = document.getElementById('submit-stripe-text');
            const submitLoading = document.getElementById('submit-stripe-loading');

            if (submitText && submitLoading) {
                submitText.classList.add('hidden');
                submitLoading.classList.remove('hidden');
            }

            paymentButton.disabled = true;
        });
    }
});

// Funciones para el modal de Stripe
let stripeModalOpen = false;

function openStripeModal() {
    const modal = document.getElementById('stripe-payment-modal');
    if (modal) {
        if (stripeModalOpen) return;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        stripeModalOpen = true;
        document.body.style.overflow = 'hidden';

        requestAnimationFrame(() => {
            const modalContent = modal.querySelector('.bg-gradient-to-br');
            if (modalContent) {
                modalContent.style.animation = 'scale-in 0.3s ease-out';
            }
        });

        const firstButton = modal.querySelector('button[type="button"]');
        if (firstButton) {
            setTimeout(() => firstButton.focus(), 100);
        }
    }
}

function closeStripeModal() {
    const modal = document.getElementById('stripe-payment-modal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        stripeModalOpen = false;
        document.body.style.overflow = '';

        const paymentForm = document.getElementById('payment-form');
        const paymentButton = document.getElementById('payment-button');
        const submitText = document.getElementById('submit-stripe-text');
        const submitLoading = document.getElementById('submit-stripe-loading');

        if (paymentButton) {
            paymentButton.disabled = false;
        }
        if (submitText && submitLoading) {
            submitText.classList.remove('hidden');
            submitLoading.classList.add('hidden');
        }
    }
}

// Cerrar modal al hacer clic fuera
document.addEventListener('click', function(e) {
    const modal = document.getElementById('stripe-payment-modal');
    if (modal && stripeModalOpen && e.target === modal) {
        closeStripeModal();
    }
});

// Cerrar modal con ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && stripeModalOpen) {
        closeStripeModal();
    }
});

// Modal de carga
function showLoadingModal(message = 'Procesando...') {
    let modal = document.getElementById('loading-modal');
    if (!modal) {
        modal = document.createElement('div');
        modal.id = 'loading-modal';
        modal.className = 'fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-center justify-center';
        modal.innerHTML = `
            <div class="bg-slate-800 rounded-2xl p-8 shadow-2xl border border-slate-600 max-w-md w-full mx-4">
                <div class="text-center">
                    <div class="w-16 h-16 border-4 border-cyan-500 border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
                    <h3 class="text-xl font-semibold text-white mb-2">${message}</h3>
                    <p class="text-gray-400">Por favor, no cierres esta ventana...</p>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
    }
    modal.style.display = 'flex';
}

function hideLoadingModal() {
    const modal = document.getElementById('loading-modal');
    if (modal) {
        modal.remove();
    }
}

// Modal de error
function showErrorModal(message) {
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-center justify-center';
    modal.innerHTML = `
        <div class="bg-slate-800 rounded-2xl p-8 shadow-2xl border border-red-500/50 max-w-md w-full mx-4 animate-scale-in">
            <div class="text-center">
                <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-icons text-red-400 text-3xl">error</span>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Error</h3>
                <p class="text-gray-400 mb-6">${message}</p>
                <button onclick="this.closest('.fixed').remove()"
                        class="px-6 py-2 bg-gradient-to-r from-red-600 to-red-500 hover:from-red-500 hover:to-red-400 text-white font-semibold rounded-xl transition-all duration-300">
                    Cerrar
                </button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
}

// Modal de información
function showInfoModal(title, message) {
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-center justify-center';
    modal.innerHTML = `
        <div class="bg-slate-800 rounded-2xl p-8 shadow-2xl border border-cyan-500/50 max-w-md w-full mx-4 animate-scale-in">
            <div class="text-center">
                <div class="w-16 h-16 bg-cyan-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-icons text-cyan-400 text-3xl">info</span>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">${title}</h3>
                <p class="text-gray-400 mb-6">${message}</p>
                <button onclick="this.closest('.fixed').remove()"
                        class="px-6 py-2 bg-gradient-to-r from-cyan-600 to-cyan-500 hover:from-cyan-500 hover:to-cyan-400 text-white font-semibold rounded-xl transition-all duration-300">
                    Entendido
                </button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
}

