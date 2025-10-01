<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar contraseña</title>
  <link rel="stylesheet" href="Login y Registro/css/olvidarcontra.css">
</head>
<body>
    
  <form class="form-recuperar" action="procesar_cambio.php" method="POST">
    <a href="javascript:history.back()" class="volver-flecha">←</a>
    <h2>Recuperar contraseña</h2>

    <p class="descripcion-recuperar">
      Por favor, ingresá una nueva contraseña y confirmala para restablecer el acceso a tu cuenta.
    </p>

    <label for="nueva">Nueva contraseña</label>
    <input type="password" id="nueva" name="nueva" required>

    <label for="confirmar">Confirmar contraseña</label>
    <input type="password" id="confirmar" name="confirmar" required>

    <button type="submit">Cambiar contraseña</button>

    <p class="descripcion-final">
      Si no solicitaste este cambio, podés ignorar este mensaje. Tu contraseña actual seguirá funcionando.
    </p>
  </form>

</body>
</html>
