<?php
session_start();
if (!isset($_SESSION['recuperar_email'])) {
  header("Location: /PAGolimpiadas/vista/iniciosesion/forget_pass.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Verificación de código</title>
  <link rel="stylesheet" href="Login y Registro/css/mail.css">
</head>
<body>

  <form class="form-validacion" method="POST" action="../../controllers/validar_codigorecuperacion.php">
    <h2>Verificación de código</h2>

    <p class="descripcion-principal">
      Ingresá el código de 4 dígitos que fue enviado a tu correo electrónico.
    </p>

    <input type="number" name="codigo" maxlength="4" required placeholder="••••">

    <button type="submit">Verificar</button>

    <p class="descripcion-secundaria">
      Esta verificación permite confirmar que sos el dueño de la cuenta.
    </p>
  </form>

</body>
</html>
