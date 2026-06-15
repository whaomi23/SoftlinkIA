<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Contacto - SoftLinkIA</title>
</head>
<body style="margin:0; font-family:Arial, Helvetica, sans-serif; background-color:#f5f7fb; color:#333;">

  <!-- Encabezado -->
  <table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td align="center" style="background:linear-gradient(135deg,#4a00e0,#8e2de2); padding:40px; color:#fff;">
        <h1 style="margin:0; font-size:28px;">🚀 Nuevo Formulario de Contacto</h1>
        <p style="margin:8px 0 0; font-size:16px;">SoftLinkIA - Desarrollo de Software e IA</p>
      </td>
    </tr>
  </table>

  <!-- Métricas -->
  <table width="100%" cellpadding="20" cellspacing="0" border="0">
    <tr align="center">
      <td style="background:#fff; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.05);">
        <h2 style="margin:0; color:#4a00e0;">500+</h2>
        <p style="margin:0; font-size:14px; color:#777;">Proyectos</p>
      </td>
      <td style="background:#fff; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.05);">
        <h2 style="margin:0; color:#4a00e0;">50+</h2>
        <p style="margin:0; font-size:14px; color:#777;">Clientes</p>
      </td>
      <td style="background:#fff; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.05);">
        <h2 style="margin:0; color:#4a00e0;">24/7</h2>
        <p style="margin:0; font-size:14px; color:#777;">Soporte</p>
      </td>
      <td style="background:#fff; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.05);">
        <h2 style="margin:0; color:#4a00e0;">100%</h2>
        <p style="margin:0; font-size:14px; color:#777;">Satisfacción</p>
      </td>
    </tr>
  </table>

  <!-- Información del Cliente -->
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:30px 0;">
    <tr>
      <td align="center">
        <h2 style="color:#4a00e0; font-size:24px;">👤 Información del Cliente</h2>
      </td>
    </tr>
  </table>
  <table width="100%" cellpadding="0" cellspacing="20" border="0" style="margin:40px 0;">
    <tr align="center">
      <td style="background:#f8fafc; padding:20px; border-radius:12px; border-left:4px solid #4a00e0; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="font-weight:bold; color:#374151; font-size:14px; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Nombre Completo</div>
        <div style="color:#1f2937; font-size:16px; line-height:1.5;">{{ $nombre }}</div>
      </td>
      <td style="background:#f8fafc; padding:20px; border-radius:12px; border-left:4px solid #4a00e0; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="font-weight:bold; color:#374151; font-size:14px; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Compañía</div>
        <div style="color:#1f2937; font-size:16px; line-height:1.5;">{{ $compania }}</div>
      </td>
    </tr>
    <tr align="center">
      <td style="background:#f8fafc; padding:20px; border-radius:12px; border-left:4px solid #4a00e0; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="font-weight:bold; color:#374151; font-size:14px; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Industria</div>
        <div style="color:#1f2937; font-size:16px; line-height:1.5;">{{ $industria }}</div>
      </td>
      <td style="background:#f8fafc; padding:20px; border-radius:12px; border-left:4px solid #4a00e0; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="font-weight:bold; color:#374151; font-size:14px; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Teléfono</div>
        <div style="color:#1f2937; font-size:16px; line-height:1.5;">{{ $telefono ?: 'No proporcionado' }}</div>
      </td>
    </tr>
    <tr align="center">
      <td colspan="2" style="background:#f8fafc; padding:20px; border-radius:12px; border-left:4px solid #4a00e0; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="font-weight:bold; color:#374151; font-size:14px; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Correo Electrónico</div>
        <div style="color:#1f2937; font-size:16px; line-height:1.5;">{{ $email }}</div>
      </td>
    </tr>
  </table>

  <!-- Detalles del Proyecto -->
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:30px 0;">
    <tr>
      <td align="center">
        <h2 style="color:#4a00e0; font-size:24px;">🎯 Detalles del Proyecto</h2>
      </td>
    </tr>
  </table>
  <table width="100%" cellpadding="0" cellspacing="20" border="0" style="margin:40px 0;">
    <tr align="center">
      <td style="background:#f8fafc; padding:20px; border-radius:12px; border-left:4px solid #4a00e0; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="font-weight:bold; color:#374151; font-size:14px; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Tipo de Consulta</div>
        <div style="color:#1f2937; font-size:16px; line-height:1.5;">{{ $tipo_consulta }}</div>
      </td>
      <td style="background:#f8fafc; padding:20px; border-radius:12px; border-left:4px solid #4a00e0; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="font-weight:bold; color:#374151; font-size:14px; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Profesionales Necesarios</div>
        <div style="color:#1f2937; font-size:16px; line-height:1.5;">{{ $profesionales }}</div>
      </td>
    </tr>
  </table>

  <!-- Mensaje del Cliente -->
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:30px 0;">
    <tr>
      <td align="center">
        <div style="background:linear-gradient(135deg,#f0f9ff,#e0f2fe); padding:25px; border-radius:12px; border-left:4px solid #0891b2; margin:20px 0; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
          <div style="font-weight:bold; color:#374151; font-size:14px; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Mensaje del Cliente</div>
          <div style="color:#1f2937; font-size:16px; line-height:1.5;">{{ $mensaje }}</div>
        </div>
      </td>
    </tr>
  </table>

  @if($tecnologias && $tecnologias !== 'Ninguna seleccionada')
  <!-- Tecnologías -->
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:30px 0;">
    <tr>
      <td align="center">
        <h2 style="color:#4a00e0; font-size:24px;">⚙️ Tecnologías Involucradas</h2>
      </td>
    </tr>
  </table>
  <table width="100%" cellpadding="0" cellspacing="20" border="0" style="margin:40px 0;">
    <tr align="center">
      <td>
        <div style="background:#f8fafc; padding:20px; border-radius:12px; border-left:4px solid #4a00e0; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
          <div style="font-weight:bold; color:#374151; font-size:14px; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Tecnologías</div>
          <div style="margin-top:15px;">
            @foreach(explode(', ', $tecnologias) as $tech)
              <span style="background:linear-gradient(135deg,#4a00e0,#8e2de2); color:white; padding:8px 16px; border-radius:25px; font-size:13px; font-weight:500; box-shadow:0 2px 4px rgba(0,0,0,0.1); margin:5px; display:inline-block;">{{ trim($tech) }}</span>
            @endforeach
          </div>
        </div>
      </td>
    </tr>
  </table>
  @endif

  <!-- Información Adicional -->
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:30px 0;">
    <tr>
      <td align="center">
        <h2 style="color:#4a00e0; font-size:24px;">📊 Información Adicional</h2>
      </td>
    </tr>
  </table>
  <table width="100%" cellpadding="0" cellspacing="20" border="0" style="margin:40px 0;">
    <tr align="center">
      <td style="background:#f8fafc; padding:20px; border-radius:12px; border-left:4px solid #4a00e0; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="font-weight:bold; color:#374151; font-size:14px; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">¿Dónde nos encontró?</div>
        <div style="color:#1f2937; font-size:16px; line-height:1.5;">{{ $donde_encontraste }}</div>
      </td>
      <td style="background:#f8fafc; padding:20px; border-radius:12px; border-left:4px solid #4a00e0; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="font-weight:bold; color:#374151; font-size:14px; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Fecha de Envío</div>
        <div style="color:#1f2937; font-size:16px; line-height:1.5;">{{ $fecha_envio }}</div>
      </td>
    </tr>
  </table>

  <!-- Footer -->
  <table width="100%" cellpadding="20" cellspacing="0" border="0" style="background:#f0f0f0;">
    <tr>
      <td align="center" style="font-size:12px; color:#777;">
        <strong>SoftLinkIA</strong> - Desarrollo de Software e Inteligencia Artificial<br>
        📧 <a href="mailto:contacto@softlinkia.com" style="color:#4a00e0; text-decoration:none; font-weight:500;">contacto@softlinkia.com</a> | 
        🌐 <a href="https://softlinkia.com" style="color:#4a00e0; text-decoration:none; font-weight:500;">softlinkia.com</a><br>
        Este email fue generado automáticamente desde nuestro formulario de contacto web.<br>
        IP: {{ $ip_address }} | User Agent: {{ substr($user_agent, 0, 100) }}...
      </td>
    </tr>
  </table>

</body>
</html>
