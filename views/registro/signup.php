<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="/Mateados/views/css/style.css" />

  <title>Registrarse | SkyWay</title>
</head>
<body>
  <div class="container" id="container">
    <div class="forms-container">
      <div class="forms" id="forms">

        <form action="" id="sign-up" class="form-register" method="POST">
          <h2>Registrarse</h2>
          <p>¿Ya tenés cuenta? <a href="/../PAGolimpiadas/vista/iniciosesion/login.php" id="link-sign-up">Inicia sesión</a></p>

          <div class="input-container">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" placeholder="Ingrese su nombre">
          </div>

          <div class="input-container">
            <label for="apellido">Apellido</label>
            <input id="apellido" type="text" name="apellido" placeholder="Ingrese su apellido">
          </div>

          <div class="input-container">
            <label for="usuario">Usuario</label>
            <input id="usuario" type="text" placeholder="Ingrese nombre de usuario" name="usuario">
          </div>

          <div class="input-container">
            <label for="doc">Número de documento</label>
            <input id="doc" type="number" placeholder="Ingrese su número de documento" name="doc">
          </div>

          <div class="input-container">
            <label for="fnacimiento">Fecha de nacimiento</label>
            <input id="fnacimiento" type="date" name="fnacimiento" required>
          </div>

          <div class="input-container">
            <label for="email">Dirección Email</label>
            <input id="email" type="email" placeholder="you@example.com" name="email">
          </div>

          <div class="input-container">
            <label for="contraseña">Contraseña</label>
            <input id="contraseña" type="password" placeholder="Ingrese su contraseña" name="contraseña">
          </div>

          <div class="remember-me">
            <input type="checkbox" id="checkbox">
            <label for="checkbox">Mostrar contraseña</label>
          </div>

          <button type="submit" class="btn-sign-un"> Confirmar registro </button>

          <div>
            <a href="index.html" class="btn-sign-un">Volver al Inicio</a>
          </div>

            <?php if (!empty($error)): ?>
    <div style="color:red;"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

        </form>
      </div>
    </div>

    <div class="banner">
      <div class="shape shape1"></div>
      <div class="shape shape2"></div>
      <div class="shape shape3"></div>
      <section>
        <h1>Bienvenido a tu <span>próxima ruta</span> <br> <br> </h1>
        <p>Iniciá sesión para acceder a tu cuenta</p>
        <img src="/images/banner.svg" alt="">
      </section>
    </div>
  </div>

  <script>
    const checkbox = document.getElementById('checkbox');
    const passInput = document.getElementById('contraseña');
    checkbox.addEventListener('change', () => {
      passInput.type = checkbox.checked ? 'text' : 'password';
    });
  </script>
</body>
</html>
