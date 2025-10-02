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
  
  <link rel="stylesheet" href="styles.css">
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
    <li><a href="#">Inicio</a></li>
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
          <a href="../productos/yerba.php">Yerba</a>
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

<div class="marquee">
  <p>20 % DE DESCUENTO EN EFECTIVO • 20 % DE DESCUENTO EN EFECTIVO • 20 % DE DESCUENTO EN EFECTIVO •</p>
</div>
<div class="carousel">
  <div class="carousel-track">

    <div class="carousel-item">
      <img src="/Mateados/views/img/imgcarru.jpg" alt="Mate 1">
      <div class="carousel-text">
        <h2>Sobre Nosotros</h2>
        <p>Somos materos y nos encanta tomar mate mañana, tarde y noche.</p>
      </div>
    </div>

    <div class="carousel-item">
      <img src="/Mateados/views/img/imgcarru2.jpg" alt="Mate 2">
      <div class="carousel-text">
        <h2>Variedad de Productos</h2>
        <p>Contamos con mates de madera, aluminio, cerámica y termos Stanley.</p>
      </div>
    </div>

    <div class="carousel-item">
      <img src="/Mateados/views/img/termos.jpeg" alt="Mate 3">
      <div class="carousel-text">
        <h2>Patrocinios</h2>
        <p>Nos respaldan marcas reconocidas de mates y termos de calidad.</p>
      </div>
    </div>

  </div>
</div>


<hr>

<section class="productos">
  <div class="contenido">
    <h2>Nuestros Productos</h2>
    <div class="cards-container">

      <a href="../productos/mates.html" class="card">
        <div class="card-img">
          <img src="/Mateados/views/img/calabaza1.jpg" alt="Mates">
          <div class="card-overlay">
            <p>Encuentra los mejores mates de madera, acero y cerámica.</p>
          </div>
        </div>
        <h3>Mates</h3>
      </a>

      <a href="../productos/termos.html" class="card">
        <div class="card-img">
          <img src="/Mateados/views/img/termos.jpeg" alt="Termos">
          <div class="card-overlay">
            <p>Termos de alta calidad para mantener tu bebida caliente.</p>
          </div>
        </div>
        <h3>Termos</h3>
      </a>

      <a href="../productos/yerbas.html" class="card">
        <div class="card-img">
          <img src="/Mateados/views/img/yerba.webp" alt="Yerbas">
          <div class="card-overlay">
            <p>Yerbas seleccionadas y blends únicos para tu mate.</p>
          </div>
        </div>
        <h3>Yerbas</h3>
      </a>

      <a href="../productos/materas.html" class="card">
        <div class="card-img">
          <img src="/Mateados/views/img/matera.webp" alt="Materos">
          <div class="card-overlay">
            <p>Materos elegantes y resistentes para cualquier ocasión.</p>
          </div>
        </div>
        <h3>Materos</h3>
      </a>

    </div>
  </div>
</section>



<hr>

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

<section class="faq-section" id="faq">
  <h2>Preguntas Frecuentes</h2>
  <div class="faq-container">

    <div class="faq-item">
      <div class="faq-question">
        <span>¿Cómo realizo una compra?</span>
        <button class="faq-toggle">+</button>
      </div>
      <div class="faq-answer">
        <p>Puedes realizar tu compra seleccionando el producto, agregándolo al carrito y siguiendo los pasos de pago.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">
        <span>¿Hacen envíos a todo el país?</span>
        <button class="faq-toggle">+</button>
      </div>
      <div class="faq-answer">
        <p>Sí, realizamos envíos a todas las provincias mediante correo certificado.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">
        <span>¿Puedo devolver un producto?</span>
        <button class="faq-toggle">+</button>
      </div>
      <div class="faq-answer">
        <p>Tienes hasta 15 días hábiles para devolver un producto en su empaque original.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">
        <span>¿Qué métodos de pago aceptan?</span>
        <button class="faq-toggle">+</button>
      </div>
      <div class="faq-answer">
        <p>Aceptamos tarjetas de crédito, débito, transferencias bancarias y billeteras virtuales.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">
        <span>¿Cuánto tarda el envío?</span>
        <button class="faq-toggle">+</button>
      </div>
      <div class="faq-answer">
        <p>El envío tarda entre 3 y 7 días hábiles según tu ubicación.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">
        <span>¿Cómo puedo contactar al soporte?</span>
        <button class="faq-toggle">+</button>
      </div>
      <div class="faq-answer">
        <p>Puedes escribirnos a través del formulario de contacto o mediante WhatsApp.</p>
      </div>
    </div>

  </div>
</section>




<footer class="footer">
  <div class="footer-container">

    <div class="footer-section">
      <h3>Contacto</h3>
      <p>Email: contacto@mateados.com</p>
      <p>Dirección: Av. Mate 123, Buenos Aires</p>
      <p>Tel: +54 11 1234-5678</p>
    </div>

    <div class="footer-section">
      <h3>Ayuda</h3>
      <p><a href="#faq">Preguntas frecuentes</a></p>
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

<script src="script.js"></script>
</body>
</html>

