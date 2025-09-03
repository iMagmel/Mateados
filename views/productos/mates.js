document.addEventListener("DOMContentLoaded", () => {
  // SLIDERS AUTOMÁTICOS
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

  // BOTONES "VER MÁS PRODUCTOS"
  function activarVerMas(botonId, contenedorId) {
    const btn = document.getElementById(botonId);
    if (!btn) return;

    btn.addEventListener("click", () => {
      const cards = document.querySelectorAll(`#${contenedorId} .card.hidden`);

      cards.forEach(card => {
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
});
