<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar contraseña</title>
  <link rel="stylesheet" href="Login y Registro/css/mail.css">
</head>
<body>

  <form class="form-validacion" method="POST" action="../../controllers/codigorecuperacion.php">
    <h2>¿Olvidaste tu contraseña?</h2>

    <p class="descripcion-principal">
      Ingresá el correo electrónico que usaste para registrarte. Te enviaremos un código de recuperación.
    </p>

    <input class type="email" name="email" placeholder="you@example.com" required>

    <button type="submit">Enviar código</button>

    <p class="descripcion-secundaria">
      Si no encontrás el correo, revisá tu carpeta de spam.
    </p>
  </form>

</body>
</html>
