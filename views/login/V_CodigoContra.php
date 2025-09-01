<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Verificación de correo</title>
  <link rel="stylesheet" href="Login y Registro/css/mail.css">
</head>
<body>

  <form class="form-validacion" action="../../controllers/C_CodigoContra.php" method="POST">
  <h2>Verificación de correo</h2>

  <p class="descripcion-principal">
    Ingresá el código de 4 dígitos que fue enviado a tu correo electrónico.
  </p>

  <div class="input-codigo">
    <input type="number" name="codigo" maxlength="4" required placeholder="••••">
  </div>

  <button type="submit">Verificar</button>

  <p class="descripcion-secundaria">
    Esta verificación nos ayuda a confirmar que la cuenta realmente te pertenece. Si no ves el correo, revisá tu carpeta de spam.
  </p>  
</form>


</body>
</html>
