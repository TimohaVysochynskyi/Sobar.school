<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакти | SOBAR.SCHOOL</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./styles/index.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/contacts.css?time=<?php echo time(); ?>">

    <link rel="stylesheet" href="./styles/header.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/footer.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/sign-form.css?time=<?php echo time(); ?>">

    <link rel="stylesheet" href="./styles/responsive.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/animate.css?time=<?php echo time(); ?>">
</head>

<body>
    <!-- HEADER -->
    <?php include('./includes/header.php'); ?>

    <main class="container">

        <!-- Контактний вступ -->
        <section class="contact-intro wow fadeInDown">
            <h1 class="section-title">Контакти</h1>
            <p class="text-regular">
                Залиште заявку через форму або скористайтеся зручним для вас способом зв’язку. Ми завжди відкриті до
                спілкування та готові відповісти на ваші питання!
            </p>
        </section>

        <!-- Форма зворотного зв'язку (повна ширина) -->
        <?php include './includes/sign-form.php'; ?>

        <!-- Інші способи зв'язку -->
        <section class="contact-methods wow fadeInUp">
            <h2 class="section-title">Інші способи зв’язку</h2>
            <div class="social-links">
                <div class="social-link">
                    <a href="https://www.facebook.com/share/g/16fCTLdx5B/" target="_blank" rel="noopener">
                        <img src="./assets/icons/facebook.png" alt="Facebook" class="social-link__icon">
                        <span class="social-link__label">Facebook</span>
                    </a>
                </div>
                <div class="social-link">
                    <a href="https://www.instagram.com/sobar.school/" target="_blank" rel="noopener">
                        <img src="./assets/icons/instagram.png" alt="Instagram" class="social-link__icon">
                        <span class="social-link__label">Instagram</span>
                    </a>
                </div>
                <div class="social-link">
                    <a href="https://t.me/bioverys" target="_blank" rel="noopener">
                        <img src="./assets/icons/telegram.png" alt="Telegram" class="social-link__icon">
                        <span class="social-link__label">Telegram</span>
                    </a>
                </div>
            </div>
            <div class="contact-email">
                <h3 class="contact-email__title">Електронна пошта</h3>
                <div class="contact-email__info">
                    <span class="contact-email__icon" aria-hidden="true">✉️</span>
                    <a href="mailto:example@gmail.com" class="contact-email__address">example@gmail.com</a>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <?php include('./includes/footer.php'); ?>

    <script src="./scripts/main.js"></script>
    <script src="./scripts/form-validation.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>