<?php
require_once __DIR__ . '/../../session/SesionUsuario.php'; 
use Sesion\SesionUsuario;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$usuario = SesionUsuario::getUsuario();
$nombre   = SesionUsuario::getNombre();  
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mateados</title>
  
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="termos.css">
</head>
<body>
  
<header>
  <div class="header-top">
    <div class="left-icons">
      <i class='bx bx-search'></i>
    </div>

    <div class="logo-title">
      <h1>Mateados</h1>
    </div>

   <div class="right-icons">
            <div class="user-menu">
                <i class='bx bx-user'></i>
                <div class="dropdown">
                          <?php if ($usuario): ?>
          <span>Hola, <?= htmlspecialchars($usuario) ?></span>
          <a href="/Mateados/controllers/CLogOut.php">Cerrar sesión</a>
      <?php else: ?>
          <a href="/Mateados/views/login/login.php">Iniciar sesión</a>
          <a href="/Mateados/controllers/CVSignUp.php">Registrarme</a>
      <?php endif; ?>

                </div>
            </div>
        </div>
      <i class='bx bx-cart'></i>
      
      <button class="menu-toggle" id="menu-toggle">
        <i class='bx bx-menu'></i>
      </button>
    </div>
  </div>

  <hr>

  <div class="mobile-nav-container" id="mobile-nav">
    <nav>
      <ul class="nav-list">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Contacto</a></li>
        <li><a href="#">Mates personalizados</a></li>
      </ul>
    </nav>
  </div>

  <nav class="desktop-nav">
  <ul class="nav-list">
    <li><a href="../pagprincipal/index.php">Inicio</a></li>
    <li class="has-submenu">
      <a href="#">Productos</a>
      <ul class="submenu">
        <li>
          <a href="../productos/mates.php">Mates</a>
          <ul class="submenu-items">
            <li><a href="../productos/mates.php">Calabaza</a></li>
            <li><a href="../productos/mates.php">Imperial</a></li>
            <li><a href="../productos/mates.php">Torpedo</a></li>
            <li><a href="../productos/mates.php">Camionero</a></li>
            <li><a href="../productos/mates.php">Algarrobo</a></li>
          </ul>
        </li>
        <li>
          <a href="../productos/termos.php">Termos</a>
          <ul class="submenu-items">
            <li><a href="../productos/termos.php">Metálico</a></li>
          </ul>
        </li>
        <li>
          <a href="../productos/yerbas.php">Yerba</a>
          <ul class="submenu-items">
            <li><a href="../productos/yerbas.php">Sara</a></li>
            <li><a href="../productos/yerbas.php">Baldo</a></li>
            <li><a href="../productos/yerbas.php">Canarias</a></li>
            <li><a href="../productos/yerbas.php">Amanda</a></li>
            <li><a href="../productos/yerbas.php">Playadito</a></li>
          </ul>
        </li>
        <li>
          <a href="../productos/materas.php">Materas</a>
          <ul class="submenu-items">
            <li><a href="../productos/materas.php">Cuero</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="#">Contacto</a></li>
  </ul>
</nav>

</header>

<main class="productos-container">
<aside class="categorias">

  <h2>Yerba</h2>
  <ul>
    <li><a href="../productos/yerbas.php">Sara</a></li>
    <li><a href="../productos/yerbas.php">Baldo</a></li>
    <li><a href="../productos/yerbas.php">Canarias</a></li>
    <li><a href="../productos/yerbas.php">Amanda</a></li>
    <li><a href="../productos/yerbas.php">Playadito</a></li>
  </ul>

  <h2>Mates</h2>
  <ul>
    <li><a href="../productos/mates.php">Calabaza</a></li>
    <li><a href="../productos/mates.php">Imperial</a></li>
    <li><a href="../productos/mates.php">Torpedo</a></li>
    <li><a href="../productos/mates.php">Camionero</a></li>
    <li><a href="../productos/mates.php">Algarrobo</a></li>
  </ul>
          <li>
          <a href="../productos/materas.php">Materas</a>
          <ul class="submenu-items">
            <li><a href="../productos/materas.php">Cuero</a></li>
          </ul>
        </li>



  

  
</aside>

<section class="galeria">
  <h2 id="calabaza">Termos Metalicos</h2>
  <div class="cards-container" id="calabaza-cards">
    <div class="card">
      <div class="slider">
        <img src="/views/img/termos.jpeg" alt="">
        <img src="/views/img/termos.jpeg" alt="">
        <img src="/views/img/termos.jpeg" alt="">
      </div>
      <h3>Metalico 1</h3>
      <div class="descripcion" style="display:none;">
        Este es un termo metalico capacitado para tomar unos ricos mates.
      </div>
      <button>Ver más</button>
    </div>
    <div class="card">
      <div class="slider">
        <img src="/views/img/termos.jpeg" alt="">
        <img src="/views/img/termos.jpeg" alt="">
        <img src="/views/img/termos.jpeg" alt="">
      </div>
      <h3>Metalico 2</h3>
      <div class="descripcion" style="display:none;">
        Este es un termo metalico capacitado para tomar unos ricos mates.
      </div>
      <button>Ver más</button>
    </div>
    <div class="card">
      <div class="slider">
        <img src="/views/img/termos.jpeg" alt="">
        <img src="/views/img/termos.jpeg" alt="">
        <img src="/views/img/termos.jpeg" alt="">
      </div>
      <h3>Metalico 3</h3>
      <div class="descripcion" style="display:none;">
        Este es un termo metalico capacitado para tomar unos ricos mates.
      </div>
      <button>Ver más</button>
    </div>
    <div class="card hidden">
      <div class="slider">
        <img src="/views/img/termos.jpeg" alt="">
        <img src="/views/img/termos.jpeg" alt="">
        <img src="/views/img/termos.jpeg" alt="">
      </div>
      <h3>Metalico 4</h3>
      <div class="descripcion" style="display:none;">
        Este es un termo metalico capacitado para tomar unos ricos mates.
      </div>
      <button>Ver más</button>
    </div>
    <div class="card hidden">
      <div class="slider">
        <img src="/views/img/termos.jpeg" alt="">
        <img src="/views/img/termos.jpeg" alt="">
        <img src="/views/img/termos.jpeg" alt="">
      </div>
      <h3>Metalico 5</h3>
      <div class="descripcion" style="display:none;">
        Este es un termo metalico capacitado para tomar unos ricos mates.
      </div>
      <button>Ver más</button>
    </div>
  </div>

  <div class="ver-mas-container">
    <button id="btn-ver-mas-calabaza">Ver más productos</button>
  </div>
</section>
</main>

<section class="reseñas">
  <div class="contenido reseñas-contenido">
    <div class="reseñas-left">
      <h3>¡Síguenos en nuestras redes!</h3>
      <p>No te pierdas ninguna de nuestras novedades, promociones y noticias.</p>
      <div class="social-icons">
        <a href="#"><i class='bx bxl-instagram'></i></a>
        <a href="#"><i class='bx bxl-tiktok'></i></a>
        <a href="#"><i class='bx bxl-twitter'></i></a>
        <a href="#"><i class='bx bxl-whatsapp'></i></a>
      </div>
    </div>

    <div class="reseñas-right">
      <h3>Déjanos tu opinión</h3>
      <textarea placeholder="Escribe aquí tu comentario..."></textarea>
      <button>Enviar</button>
    </div>
  </div>
</section>
<footer class="footer">
  <div class="footer-container">

    <div class="footer-section">
      <h3>Contacto</h3>
      <p>Email: contacto@matedos.com</p>
      <p>Dirección: Av. Mate 123, Buenos Aires</p>
      <p>Tel: +54 11 1234-5678</p>
    </div>

    <div class="footer-section">
      <h3>Ayuda</h3>
      <p><a href="#">Preguntas frecuentes</a></p>
      <p><a href="#">Guía de compra</a></p>
      <p><a href="#">Soporte técnico</a></p>
    </div>

    <div class="footer-section">
      <h3>Políticas</h3>
      <p><a href="#">Política de privacidad</a></p>
      <p><a href="#">Términos y condiciones</a></p>
      <p><a href="#">Devoluciones y envíos</a></p>
    </div>

  </div>

  <div class="footer-bottom">
    <p>© 2025 Mateados - Todos los derechos reservados</p>
  </div>
</footer>

<div id="portal" class="portal">
  <div class="portal-content">
    <span class="cerrar">&times;</span>
    <div class="portal-slider">
      <img src="" alt="" class="active">
      <img src="" alt="">
      <img src="" alt="">
    </div>
    <h3 class="portal-titulo"></h3>
    <p class="portal-descripcion"></p>
    <div class="portal-footer">
      <i class='bx bx-heart portal-corazon'></i>
      <button class="portal-carrito" id="agregarCarrito">Agregar al carrito</button>
    </div>
  </div>
</div>

<div id="portalCarrito" class="portal">
  <div class="portal-content">
    <span class="cerrar-carrito">
      <i class='bx bx-x'></i>
    </span>
    <h2>Tu carrito</h2>
    <div class="portal-productos"></div>
  </div>
</div>
<script src="termos.js"></script>
</body>
</html>
