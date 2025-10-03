document.addEventListener("DOMContentLoaded", () => {
  
  const sliders = document.querySelectorAll(".slider");

  sliders.forEach(slider => {
    let index = 0;
    const images = slider.querySelectorAll("img");
    images[index].classList.add("active");

    setInterval(() => {
      images[index].classList.remove("active");
      index = (index + 1) % images.length;
      images[index].classList.add("active");
    }, 3000);
  });

  function activarVerMas(botonId, contenedorId) {
    const btn = document.getElementById(botonId);
    const contenedor = document.getElementById(contenedorId);
    if (!btn || !contenedor) return;

    btn.addEventListener("click", () => {
      const cards = contenedor.querySelectorAll(".card.hidden");
      cards.forEach(card => {
        card.classList.remove("hidden");
        card.classList.add("show");
      });
      btn.style.display = "none";
    });
  }

  activarVerMas("btn-ver-mas-calabaza", "calabaza-cards");
  activarVerMas("btn-ver-mas-imperial", "imperial-cards");
  activarVerMas("btn-ver-mas-torpedo", "torpedo-cards");
  activarVerMas("btn-ver-mas-camionero", "camionero-cards");
  activarVerMas("btn-ver-mas-algarrobo", "algarrobo-cards");
  activarVerMas("btn-ver-mas-materas", "materas-cards");
  activarVerMas("btn-ver-mas-termos", "termos-cards");
  activarVerMas("btn-ver-mas-sara", "sara-cards");
  activarVerMas("btn-ver-mas-baldo", "baldo-cards");
  activarVerMas("btn-ver-mas-canarias", "canarias-cards");

  const portal = document.getElementById("portal");
  const portalCerrar = portal.querySelector(".cerrar");
  const portalTitulo = portal.querySelector(".portal-titulo");
  const portalDescripcion = portal.querySelector(".portal-descripcion");
  const portalSlider = portal.querySelector(".portal-slider");
  const btnAgregarCarrito = document.getElementById("agregarCarrito");

  let portalInterval;
  let productoActual = null;

  function abrirPortal(titulo, descripcion, imagenes) {
    portalSlider.innerHTML = "";

    imagenes.forEach((img, i) => {
      const portalImg = img.cloneNode();
      if (i === 0) portalImg.classList.add("active");
      portalSlider.appendChild(portalImg);
    });

    productoActual = {
      titulo,
      descripcion,
      imagenes: Array.from(imagenes).map(img => img.src)
    };

    portalTitulo.textContent = titulo;
    portalDescripcion.textContent = descripcion;

    portal.classList.add("show");

    const portalImages = portalSlider.querySelectorAll("img");
    let index = 0;
    clearInterval(portalInterval);
    portalInterval = setInterval(() => {
      portalImages[index].classList.remove("active");
      index = (index + 1) % portalImages.length;
      portalImages[index].classList.add("active");
    }, 3000);
  }

  const botonesVerMas = document.querySelectorAll(".galeria .card button");
  botonesVerMas.forEach(btn => {
    btn.addEventListener("click", () => {
      const card = btn.closest(".card");
      const titulo = card.querySelector("h3").textContent;
      const descripcion = card.querySelector(".descripcion").textContent;
      const imagenes = card.querySelectorAll(".slider img");

      abrirPortal(titulo, descripcion, imagenes);
    });
  });

  portalCerrar.addEventListener("click", () => {
    portal.classList.remove("show");
    clearInterval(portalInterval);
  });

  const carrito = [];
  const portalCarrito = document.getElementById("portalCarrito");
  const portalCerrarCarrito = portalCarrito.querySelector(".cerrar-carrito");
  const portalProductos = portalCarrito.querySelector(".portal-productos");
  const carritoIcon = document.querySelector(".bx-cart");

  btnAgregarCarrito.addEventListener("click", () => {
    if (productoActual) {
      carrito.push(productoActual);
      mostrarAlertaCompra(`${productoActual.titulo} agregado al carrito`);
      portal.classList.remove("show"); 
    }
  });

  // Alerta personalizada con la misma colorimetría que login/registro
  function mostrarAlertaCompra(mensaje, callback) {
    const alertaExistente = document.getElementById('custom-alert');
    if (alertaExistente) alertaExistente.remove();

    const alerta = document.createElement('div');
    alerta.id = 'custom-alert';
    alerta.innerHTML = `
      <style>
        #custom-alert {
          position: fixed;
          top: 0; left: 0; right: 0; bottom: 0;
          background: rgba(59, 80, 59, 0.18);
          display: flex;
          align-items: center;
          justify-content: center;
          z-index: 9999;
        }
        #custom-alert-box {
          background: #fff;
          border-radius: 16px;
          padding: 32px 24px;
          box-shadow: 0 4px 24px rgba(91,117,83,0.18);
          text-align: center;
          font-family: 'Roboto', sans-serif;
          min-width: 300px;
          border: 2px solid #c5d6b0;
        }
        #custom-alert-title {
          color: #5b7553;
          font-size: 1.5rem;
          margin-bottom: 8px;
          font-weight: 700;
          border-bottom: 2px solid #ffdd57;
          display: inline-block;
          padding-bottom: 4px;
        }
        #custom-alert-btn {
          margin-top: 18px;
          background: #5b7553;
          color: #fff;
          border: none;
          border-radius: 8px;
          padding: 10px 28px;
          font-size: 1rem;
          cursor: pointer;
          font-weight: 500;
          transition: background 0.3s;
        }
        #custom-alert-btn:hover {
          background: #3e503b;
        }
      </style>
      <div id='custom-alert-box'>
        <div id='custom-alert-title'>¡Aviso!</div>
        <div style='color:#333; margin-top:8px;'>${mensaje}</div>
        <button id='custom-alert-btn'>Continuar</button>
      </div>
    `;
    document.body.appendChild(alerta);

    document.getElementById('custom-alert-btn').onclick = function() {
      alerta.remove();
      if (typeof callback === 'function') callback();
    };
  }

  portalProductos.addEventListener("click", function(e) {
    if (e.target.classList.contains("comprar")) {
      if (typeof usuarioLogueado !== "undefined" && !usuarioLogueado) {
        mostrarAlertaCompra("Debes iniciar sesión para comprar.", function() {
          window.location.href = "/Mateados/views/login/login.php";
        });
        return;
      }
      const btn = e.target;
      const i = btn.dataset.index;

    fetch('/Mateados/controllers/CVenta.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({
        cantidad: 1,
        producto: carrito[i].titulo 
      })
    })
      .then(res => res.json())
      .then(data => {
        if(data.success){
          mostrarAlertaCompra(`¡Gracias por tu compra de ${carrito[i].titulo}!<br>Tu pedido ya está listo para retirar en el local. El pago se realiza al momento del retiro.`, function() {
            carrito.splice(i, 1); 
            btn.closest(".portal-item").remove();
            if (carrito.length === 0) {
              portalProductos.innerHTML = "<p>Tu carrito está vacío</p>";
            }
          });
        } else {
          mostrarAlertaCompra('Error al registrar la compra');
        }
      });
    }
  });

  carritoIcon.addEventListener("click", () => {
    portalProductos.innerHTML = "";

    if (carrito.length === 0) {
      portalProductos.innerHTML = "<p>Tu carrito está vacío</p>";
    } else {
      carrito.forEach((item, index) => {
        const div = document.createElement("div");
        div.classList.add("portal-item");
        div.innerHTML = `
          <img src="${item.imagenes[0]}" alt="${item.titulo}">
          <div class="texto">
            <h4>${item.titulo}</h4>
            <p>${item.descripcion}</p>
          </div>
          <div class="portal-botones">
            <button class="comprar" data-index="${index}">Comprar</button>
            <button class="eliminar" data-index="${index}">Eliminar</button>
          </div>
        `;
        portalProductos.appendChild(div);
      });

      // Botón eliminar
      portalProductos.querySelectorAll(".eliminar").forEach(btn => {
        btn.addEventListener("click", () => {
          const i = btn.dataset.index;
          carrito.splice(i, 1); 
          btn.closest(".portal-item").remove(); 

          if (carrito.length === 0) {
            portalProductos.innerHTML = "<p>Tu carrito está vacío</p>";
          }
        });
      });
    }
    portalCarrito.classList.add("show");
  });

  portalCerrarCarrito.addEventListener("click", () => {
    portalCarrito.classList.remove("show");
  });

  const productosLink = document.querySelector(".desktop-nav .has-submenu > a");
  const submenu = document.querySelector(".desktop-nav .has-submenu .submenu");

  if (productosLink && submenu) {
    productosLink.addEventListener("click", (e) => {
      e.preventDefault(); 
      submenu.classList.toggle("open");
    });
  }
});

const userIcon = document.querySelector(".user-menu i");
const userDropdown = document.querySelector(".user-menu .dropdown");

if (userIcon && userDropdown) {
  userIcon.addEventListener("click", (e) => {
    e.preventDefault();
    userDropdown.classList.toggle("open");
  });
}