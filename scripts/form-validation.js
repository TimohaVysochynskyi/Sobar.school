document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contactForm");
  const status = document.getElementById("formStatus");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const age = parseInt(form.age.value);
    const interest = form.interest.value.trim();
    const time = form.time.value.trim();

    if (!name || !email || isNaN(age) || !interest || !time) {
      status.textContent = "Будь ласка, заповніть усі поля.";
      status.style.color = "red";
      return;
    }

    if (!validateEmailOrPhone(email)) {
      status.textContent = "Введіть правильний email або номер телефону.";
      status.style.color = "red";
      return;
    }

    form.submit();
  });

  function validateEmailOrPhone(input) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^\+?\d{9,15}$/;
    return emailRegex.test(input) || phoneRegex.test(input);
  }
});
