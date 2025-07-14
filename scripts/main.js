document.addEventListener("DOMContentLoaded", function () {
  const burger = document.getElementById("burgerBtn");
  const nav = document.getElementById("mainNav");
  burger.addEventListener("click", function () {
    burger.classList.toggle("active");
    nav.classList.toggle("open");
    document.body.classList.toggle("nav-open");
  });
  // Закриття меню при кліку на посилання (опціонально)
  nav.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      burger.classList.remove("active");
      nav.classList.remove("open");
      document.body.classList.remove("nav-open");
    });
  });
});
