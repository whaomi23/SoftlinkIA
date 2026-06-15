# Configuración de PayPal para SoftLinkIA

## Variables de Entorno Requeridas

Agrega estas variables a tu archivo `.env`:

```env
# PayPal Configuration
PAYPAL_CLIENT_ID=tu_client_id_aqui
PAYPAL_CLIENT_SECRET=tu_client_secret_aqui
PAYPAL_MODE=sandbox
```

## Modos de PayPal

- **sandbox**: Modo de pruebas (recomendado para desarrollo)
- **live**: Modo de producción (para pagos reales)

## Cómo Obtener las Credenciales de PayPal

### 1. Crear una Cuenta de Desarrollador

1. Ve a [PayPal Developer](https://developer.paypal.com/)
2. Inicia sesión con tu cuenta de PayPal o crea una nueva
3. Ve a **Dashboard** → **My Apps & Credentials**

### 2. Crear una Aplicación

1. Click en **Create App**
2. Completa el formulario:
   - **App Name**: SoftLinkIA (o el nombre que prefieras)
   - **Merchant**: Selecciona tu cuenta de negocio
   - **Features**: Selecciona las características que necesites
3. Click en **Create App**

### 3. Obtener las Credenciales

Después de crear la app, verás:

- **Client ID**: Copia este valor para `PAYPAL_CLIENT_ID`
- **Client Secret**: Click en **Show** y copia para `PAYPAL_CLIENT_SECRET`

### 4. Para Producción

1. Cambia el modo a **Live** en el dashboard
2. Crea una nueva aplicación en modo Live
3. Obtén las credenciales de producción
4. Actualiza `PAYPAL_MODE=live` en tu `.env`

## Funcionalidades Implementadas

### ✅ Creación de Orden
- Crea una orden de pago en PayPal con todos los cursos del carrito
- Genera un ID único de sesión para rastrear el pago
- Calcula el total automáticamente

### ✅ Proceso de Pago
1. Usuario hace clic en "Pagar con PayPal"
2. Se crea una orden en PayPal
3. Usuario es redirigido a PayPal para completar el pago
4. Después del pago exitoso, regresa a SoftLinkIA
5. Se procesan las inscripciones automáticamente
6. Se limpia el carrito

### ✅ Características de Seguridad
- Verificación de sesión de pago
- Validación de pagos en PayPal
- Logs de transacciones
- Manejo de errores robusto

## Rutas Implementadas

- `POST /paypal/create-order` - Crear orden de pago
- `GET /paypal/success` - Manejar pago exitoso (callback de PayPal)
- `GET /paypal/cancel` - Manejar cancelación de pago
- `POST /paypal/capture` - Capturar pago (alternativa)

## Moneda Configurada

- **Moneda**: MXN (Pesos Mexicanos)
- **Configuración**: Los pagos se procesan en pesos mexicanos
- **Conversión**: Los precios se almacenan en pesos mexicanos en la base de datos

## Flujo de Pago con PayPal

```
1. Usuario hace clic en "Pagar con PayPal"
   ↓
2. Se crea una orden en PayPal con los cursos del carrito
   ↓
3. Usuario es redirigido a PayPal para aprobar el pago
   ↓
4. Usuario completa el pago en PayPal
   ↓
5. PayPal redirige a /paypal/success
   ↓
6. Se captura el pago automáticamente
   ↓
7. Se procesan las inscripciones
   ↓
8. Se limpia el carrito
   ↓
9. Usuario es redirigido a "Mis Cursos"
```

## Pruebas con PayPal Sandbox

### Cuentas de Prueba

PayPal Sandbox proporciona cuentas de prueba:

1. **Cuenta Personal**: Para simular compradores
2. **Cuenta de Negocio**: Para recibir pagos

### Tarjetas de Prueba

PayPal Sandbox acepta estas tarjetas de prueba:

- **Visa**: 4111111111111111
- **Mastercard**: 5555555555554444
- **American Express**: 378282246310005

**Nota**: Usa cualquier fecha de expiración futura y cualquier CVV.

### Cuentas de Prueba Predefinidas

PayPal crea automáticamente cuentas de prueba. Puedes usarlas o crear nuevas en el dashboard.

## Controlador

El controlador `PayPalController` está ubicado en:
- `app/Http/Controllers/PayPalController.php`

### Métodos Principales

- `createOrder()` - Crea una orden de pago en PayPal
- `captureOrder()` - Captura el pago después de la aprobación
- `success()` - Maneja el callback de éxito de PayPal
- `cancel()` - Maneja la cancelación del pago
- `getAccessToken()` - Obtiene token de acceso de PayPal (privado)
- `processEnrollments()` - Procesa inscripciones después del pago (privado)

## Comparación con Stripe

| Característica | Stripe | PayPal |
|---------------|--------|--------|
| Método | Payment Links | Orders API |
| Redirección | Sí | Sí |
| Webhooks | Sí | Opcional |
| Moneda | MXN | MXN |
| Modo Sandbox | Sí | Sí |

## Próximos Pasos

1. ✅ Configurar las variables de entorno
2. ✅ Probar con cuentas de PayPal Sandbox
3. ✅ Verificar que los pagos se procesen correctamente
4. ✅ Cambiar a modo producción cuando esté listo
5. ⚠️ (Opcional) Configurar webhooks de PayPal para confirmación más robusta

## Notas Importantes

- **Sandbox vs Live**: Asegúrate de usar credenciales correctas según el modo
- **URLs de Callback**: Las URLs de retorno deben ser accesibles públicamente
- **Logs**: Revisa los logs en `storage/logs/laravel.log` para debugging
- **Seguridad**: Nunca expongas tus credenciales en el código fuente

## Solución de Problemas

### Error: "Invalid Client ID"
- Verifica que `PAYPAL_CLIENT_ID` esté correcto
- Asegúrate de usar credenciales del modo correcto (sandbox/live)

### Error: "Invalid Client Secret"
- Verifica que `PAYPAL_CLIENT_SECRET` esté correcto
- Regenera el secret si es necesario

### Error: "Order not found"
- Verifica que la orden se haya creado correctamente
- Revisa los logs para más detalles

### El pago se completa pero no se procesan las inscripciones
- Verifica que la sesión esté configurada correctamente
- Revisa los logs del método `processEnrollments()`

---

✅ **Sistema de Pagos con PayPal Implementado**

🛒 **Características Principales:**
- Creación de órdenes de pago únicas
- Redirección a PayPal para completar el pago
- Proceso simplificado: El usuario solo hace clic y paga
- Seguro: Verificación de pagos y manejo de errores
- Compatible con Stripe: Ambos métodos disponibles

📁 **Archivos Creados/Modificados:**
- `PayPalController.php` - Controlador principal de PayPal
- `config/services.php` - Configuración de PayPal
- `routes/web.php` - Rutas de PayPal
- `resources/views/usuario-estudiante/carrito/index.blade.php` - Botón de PayPal agregado
- `PAYPAL_SETUP.md` - Documentación de configuración

🔄 **Flujo de Pago:**
1. Usuario hace clic en "Pagar con PayPal"
2. Se crea una orden única en PayPal
3. Usuario es redirigido a PayPal para completar el pago
4. Después del pago exitoso regresa a SoftLinkIA
5. Se procesan las inscripciones automáticamente
6. Se limpia el carrito del usuario

⚙️ **Configuración Requerida:**
Agrega estas variables a tu `.env`:
```env
PAYPAL_CLIENT_ID=tu_client_id
PAYPAL_CLIENT_SECRET=tu_client_secret
PAYPAL_MODE=sandbox
```

🎯 **Ventajas del Sistema:**
- Simple: No necesitas manejar formularios de pago
- Seguro: PayPal maneja toda la seguridad
- Flexible: Funciona con cualquier cantidad de cursos
- Confiable: Verificación de pagos robusta
- Escalable: Fácil de mantener y actualizar

