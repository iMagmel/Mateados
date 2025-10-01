document.addEventListener("DOMContentLoaded", () => {

  const productosLink = document.querySelector(".desktop-nav .has-submenu > a");
  const submenu = document.querySelector(".desktop-nav .has-submenu .submenu");

  if (productosLink && submenu) {
    productosLink.addEventListener("click", (e) => {
      e.preventDefault(); 
      submenu.classList.toggle("open");
    });
  }

  const userIcon = document.querySelector(".user-menu i");
  const userDropdown = document.querySelector(".user-menu .dropdown");

  if (userIcon && userDropdown) {
    userIcon.addEventListener("click", (e) => {
      e.preventDefault();
      userDropdown.classList.toggle("open");
    });
  }
});
document.addEventListener("DOMContentLoaded", () => {
  const faqItems = document.querySelectorAll(".faq-item");

  faqItems.forEach(item => {
    const question = item.querySelector(".faq-question");

    question.addEventListener("click", () => {
      item.classList.toggle("active");
    });
  });
});