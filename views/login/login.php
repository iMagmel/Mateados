<?php

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once __DIR__ . "/../../controllers/CLogin.php";
    $log = new CLogin();
    $email = $_POST['email'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    $error =  $log->VerifyLog($usuario, $password, $email);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/Mateados/views/css/style.css" />
    <title>Iniciar sesión | Mateados</title>
</head>
<body>


<div class="container" id="container">
    <div class="forms-container">
        <div class="forms" id="forms">
            <form method="POST" action="" id="sign-in">
                <h2>Login</h2>
                <p>¿No tenes cuenta todavia? <a href="/Mateados/controllers/CVSignUp.php" id="link-sing-in">Registrarte</a></p>
                <div class="input-container">
                    <label for="email">Direccion Email</label>
                    <input id="email" name="email" type="email" placeholder="you@example.com" />
                </div>
                <div class="input-container">
                    <label for="usuario">usuario</label>
                    <input id="usuario" type="text" name="usuario" placeholder="ingrese el nombre del usuario" />
                </div>
                <div class="input-container">
                    <div class="forget">
                        <label for="password">Contraseña</label>
                    </div>
                    <input id="password" type="password" name="password" placeholder="enter 5 characters or more" />
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="checkbox" />
                    <label for="checkbox">Mostrar contraseña</label>
                    
                </div>
                <button type="submit" class="button"> Entrar </button>
                <div>
                
                </div>
                <a href="../pagprincipal/index.php" class="button">Inicio</a>

                <?php if ($error): ?>
                    <div class="error-message" style="color:red; margin-top:10px;">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <div class="banner">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
        <div class="shape shape3"></div>
        <section>
            <h1>Bienvenido a tu <span>próximo mate</span> <br> <br> <br> </h1>
            <img src="/images/banner.svg" alt="" />
        </section>
    </div>

    <div class="sidebar" id="sidebar"></div>
</div>

<br />

<script src="scripts.js"></script>
<script>

const checkbox = document.getElementById('checkbox');
const passwordInput = document.getElementById('password');

checkbox.addEventListener('change', () => {
    if (checkbox.checked) {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
});
</script>
</body>
</html>
