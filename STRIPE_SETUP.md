# Configuración de Stripe para SoftLinkIA

## Variables de Entorno Requeridas

Agrega estas variables a tu archivo `.env`:

```env
# Stripe Configuration
STRIPE_KEY=pk_test_...
STRIPE_SECRET=sk_test_...
STRIPE_WEBHOOK_SECRET=whsec_...
```

## Moneda Configurada

- **Moneda**: MXN (Pesos Mexicanos)
- **Configuración**: Los pagos se procesan en pesos mexicanos
- **Conversión**: Los precios se almacenan en pesos mexicanos en la base de datos

## Cómo Obtener las Claves de Stripe

1. **Accede a tu Dashboard de Stripe**: https://dashboard.stripe.com/apikeys
2. **Clave Pública (STRIPE_KEY)**: 
   - Copia la clave que empieza con `pk_test_` (modo test) o `pk_live_` (modo producción)
3. **Clave Secreta (STRIPE_SECRET)**:
   - Copia la clave que empieza con `sk_test_` (modo test) o `sk_live_` (modo producción)
4. **Webhook Secret (STRIPE_WEBHOOK_SECRET)**:
   - Ve a Webhooks en tu dashboard
   - Crea un endpoint para `https://tudominio.com/stripe/webhook`
   - Copia el secret que empieza con `whsec_`

## Funcionalidades Implementadas

### ✅ Payment Links
- Generación automática de enlaces de pago únicos
- Un solo enlace por carrito (sin importar cuántos cursos)
- Redirección automática después del pago exitoso

### ✅ Proceso de Pago
1. Usuario hace clic en "Pagar con Stripe"
2. Se crea un Payment Link único para su carrito
3. Usuario es redirigido a Stripe para completar el pago
4. Después del pago exitoso, regresa a SoftLinkIA
5. Se procesan las inscripciones automáticamente
6. Se limpia el carrito

### ✅ Características de Seguridad
- Verificación de sesión de pago
- Validación de pagos en Stripe
- Logs de transacciones
- Manejo de errores

## Rutas Implementadas

- `POST /payment/create-link` - Crear enlace de pago
- `GET /payment/success` - Manejar pago exitoso
- `GET /payment/cancel` - Manejar cancelación de pago

## Próximos Pasos

1. Configurar las variables de entorno
2. Probar con tarjetas de prueba de Stripe
3. Configurar webhooks (opcional)
4. Cambiar a modo producción cuando esté listo


✅ Sistema de Pagos con Stripe Implementado:
🛒 Características Principales:
Payment Links únicos: Un solo enlace por carrito (sin importar cuántos cursos)
Sin registro en Stripe: Usa enlaces de pago, no integración directa
Proceso simplificado: El usuario solo hace clic y paga
Seguro: Verificación de pagos y manejo de errores
📁 Archivos Creados/Modificados:
PaymentController.php - Controlador principal de pagos
StripeWebhookController.php - Manejo de webhooks (opcional)
config/services.php - Configuración de Stripe
routes/web.php - Rutas de pago
Carrito views - Botones actualizados
STRIPE_SETUP.md - Documentación de configuración
🔄 Flujo de Pago:
Usuario hace clic en "Pagar con Stripe"
Se crea un Payment Link único para su carrito completo
Usuario es redirigido a Stripe para completar el pago
Después del pago exitoso regresa a SoftLinkIA
Se procesan las inscripciones automáticamente
Se limpia el carrito del usuario
⚙️ Configuración Requerida:
Agrega estas variables a tu .env:
🎯 Ventajas del Sistema:
Simple: No necesitas manejar formularios de pago
Seguro: Stripe maneja toda la seguridad
Flexible: Funciona con cualquier cantidad de cursos
Confiable: Webhooks para confirmación robusta
Escalable: Fácil de mantener y actualizar
