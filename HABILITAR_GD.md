# Cómo Habilitar la Extensión GD en PHP (XAMPP)

## Problema
La extensión GD de PHP no está disponible en el servidor web, aunque puede estar disponible en CLI.

## Solución para XAMPP en Windows

### Paso 1: Encontrar el archivo php.ini

Tu `php.ini` está en: **`C:\xampp\php\php.ini`**

O verifica visitando: `http://127.0.0.1:8000/certificados/diagnostico-gd`

### Paso 2: Editar php.ini

1. Abre el archivo `C:\xampp\php\php.ini` con un editor de texto (Notepad++, VS Code, etc.)
2. Presiona `Ctrl+F` y busca: `extension=gd`
3. Busca la línea que dice: `;extension=gd` (con punto y coma al inicio)
4. **Quita el punto y coma (`;`)** al inicio para que quede: `extension=gd`
5. Guarda el archivo (`Ctrl+S`)

**Nota:** Si no encuentras `extension=gd`, busca `;extension=gd2` y descoméntala también.

### Paso 3: Reiniciar XAMPP

1. Abre el **Panel de Control de XAMPP**
2. Detén Apache (si está corriendo)
3. Inicia Apache nuevamente

**O desde terminal:**
```bash
# Detener Apache
net stop Apache2.4

# Iniciar Apache
net start Apache2.4
```

**Si usas `php artisan serve`:**
- Presiona `Ctrl+C` para detener
- Ejecuta: `php artisan serve`

### Paso 4: Verificar

1. Visita: `http://127.0.0.1:8000/certificados/diagnostico-gd`
2. Verifica que `gd_loaded` sea `true`
3. Intenta generar el QR nuevamente

## Solución Automática Implementada

**¡Buenas noticias!** El código ahora tiene un **fallback automático**:
- Si GD no está disponible, **automáticamente genera el QR en formato SVG** (que no requiere GD)
- El SVG funciona igual de bien y se puede escanear normalmente
- Solo se verá ligeramente diferente (vectorial en lugar de imagen)

## Notas Importantes

- El `php.ini` usado por CLI puede ser diferente al usado por el servidor web
- En XAMPP, ambos suelen usar el mismo `php.ini` en `C:\xampp\php\php.ini`
- Después de editar `php.ini`, **SIEMPRE reinicia Apache**
- Si no puedes habilitar GD, el sistema usará SVG automáticamente

