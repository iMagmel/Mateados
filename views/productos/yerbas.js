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
      alert(`${productoActual.titulo} agregado al carrito`);
      portal.classList.remove("show"); 
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
        <div>
          <h4>${item.titulo}</h4>
          <p>${item.descripcion}</p>
        </div>
        <button class="eliminar" data-index="${index}">Eliminar</button>
      `;
      portalProductos.appendChild(div);
    });

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
