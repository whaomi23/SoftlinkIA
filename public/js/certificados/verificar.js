// Forzar recarga de la imagen QR cuando se regenera
document.addEventListener('DOMContentLoaded', function() {
    // Verificar si hay un QR regenerado
    if (window.QR_REGENERATED && window.CERTIFICADO_ID) {
        const qrImage = document.getElementById('qr-image-' + window.CERTIFICADO_ID);
        if (qrImage) {
            // Forzar recarga de la imagen con timestamp
            const src = qrImage.src.split('?')[0];
            qrImage.src = src + '?v=' + new Date().getTime();

            // Agregar efecto de fade in
            qrImage.style.opacity = '0';
            qrImage.style.transition = 'opacity 0.5s ease-in-out';

            qrImage.onload = function() {
                setTimeout(() => {
                    qrImage.style.opacity = '1';
                }, 100);
            };
        }
    }

    // Auto-ocultar mensajes después de 5 segundos
    setTimeout(function() {
        const successMessages = document.querySelectorAll('.bg-green-50, .bg-red-50');
        successMessages.forEach(function(msg) {
            msg.style.transition = 'opacity 0.5s ease-out';
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 500);
        });
    }, 5000);
});

