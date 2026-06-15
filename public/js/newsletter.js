document.addEventListener('DOMContentLoaded', function() {
    const newsletterForm = document.getElementById('newsletter-form');
    const newsletterEmail = document.getElementById('newsletter-email');
    const newsletterMessage = document.getElementById('newsletter-message');

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const email = newsletterEmail.value.trim();
            
            if (!email) {
                showMessage('Por favor, ingresa tu correo electrónico.', 'error');
                return;
            }

            if (!isValidEmail(email)) {
                showMessage('Por favor, ingresa un correo electrónico válido.', 'error');
                return;
            }

            // Show loading state
            const submitButton = newsletterForm.querySelector('button[type="submit"]');
            const originalButtonContent = submitButton.innerHTML;
            submitButton.innerHTML = '<div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div>';
            submitButton.disabled = true;

            try {
                const response = await fetch('/newsletter/subscribe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                       document.querySelector('input[name="_token"]')?.value
                    },
                    body: JSON.stringify({ email: email })
                });

                const data = await response.json();

                if (data.success) {
                    showMessage(data.message, 'success');
                    newsletterEmail.value = '';
                } else {
                    showMessage(data.message || 'Hubo un error al procesar tu suscripción.', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage('Hubo un error de conexión. Por favor, inténtalo de nuevo.', 'error');
            } finally {
                // Restore button state
                submitButton.innerHTML = originalButtonContent;
                submitButton.disabled = false;
            }
        });
    }

    function showMessage(message, type) {
        if (newsletterMessage) {
            newsletterMessage.textContent = message;
            newsletterMessage.className = `mt-3 text-sm ${type === 'success' ? 'text-green-400' : 'text-red-400'}`;
            newsletterMessage.classList.remove('hidden');
            
            // Hide message after 5 seconds
            setTimeout(() => {
                newsletterMessage.classList.add('hidden');
            }, 5000);
        }
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
