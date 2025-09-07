document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contactForm");
  const status = document.getElementById("formStatus");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const name = form.name.value.trim();
    const phone = form.phone.value.trim();
    const age = parseInt(form.age.value);
    const interest = form.interest.value.trim();
    const time = form.time.value.trim();

    if (!name || !phone || isNaN(age) || !interest || !time) {
      status.textContent = "Будь ласка, заповніть усі поля.";
      status.style.color = "red";
      return;
    }

    if (!validatePhone(phone)) {
      status.textContent = "Введіть правильний номер телефону.";
      status.style.color = "red";
      return;
    }

    form.submit();
  });

  function validatePhone(input) {
    const phoneRegex = /^\+?\d{9,15}$/;
    return phoneRegex.test(input);
  }
});
