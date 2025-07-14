<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Математика для дітей | SOBAR.SCHOOL</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./styles/index.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/service-page.css?time=<?php echo time(); ?>">

    <link rel="stylesheet" href="./styles/header.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/footer.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/sign-form.css?time=<?php echo time(); ?>">

    <link rel="stylesheet" href="./styles/responsive.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/animate.css?time=<?php echo time(); ?>">
</head>

<body>
    <!-- HEADER -->
    <?php include('./includes/header.php') ?>

    <!-- Hero Section -->
    <section class="hero service-hero">
        <div class="hero__col wow fadeInLeft">
            <h1 class="hero__title">Математика для дітей з труднощами в навчанні</h1>
            <p class="text-regular">
                Для дітей 6–12 років з дискалькулією, труднощами з абстрактним мисленням, увагою, пам’яттю або тими,
                кому складно засвоїти математику в школі. Пояснюємо через практику, побут, ігри та візуальні шаблони.
            </p>
            <a href="./#sign" class="purple-btn">Записатися на консультацію</a>
        </div>
        <img class="hero__img wow fadeInRight" src="./assets/img/services/service-math.png"
            alt="Математика для дітей з труднощами в навчанні">
    </section>

    <main class="container">

        <!-- Як проходить заняття -->
        <section class="service-section service-section--1">
            <h2 class="section-title wow fadeInLeft">Як проходить заняття</h2>
            <div class="service-cards">
                <div class="service-card wow fadeInLeft">
                    <div class="service-card__icon">
                        <img src="./assets/img/services/google-meet.png" alt="Онлайн" class="service-icon">
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Онлайн</h3>
                        <p class="text-regular">Zoom, Google Meet</p>
                    </div>
                </div>
                <div class="service-card wow fadeInUp">
                    <div class="service-card__icon">
                        <img src="./assets/img/services/individual.png" alt="Індивідуально" class="service-icon">
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Індивідуально</h3>
                        <p class="text-regular">Один на один, з темпом дитини</p>
                    </div>
                </div>
                <div class="service-card wow fadeInRight">
                    <div class="service-card__icon">
                        <img src="./assets/img/services/duration.png" alt="Тривалість" class="service-icon">
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Тривалість</h3>
                        <p class="text-regular">45 або 60 хвилин</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Що використовуємо -->
        <section class="service-section service-section--2">
            <div class="info-grid">
                <div class="info__title-wrapper wow fadeInLeft">
                    <h2 class="section-title">Що використовуємо</h2>
                </div>
                <div class="info-card wow fadeInDown">
                    <img src="./assets/img/services/miro.png" alt="MIRO" class="info-card-img">
                    <p class="text-regular">Інтерактивна дошка (MIRO)</p>
                </div>
                <div class="info-card wow fadeInRight">
                    <img src="./assets/img/services/wordwall.png" alt="Wordwall" class="info-card-img">
                    <p class="text-regular">Вправи: Wordwall</p>
                </div>
                <div class="info-card wow fadeInLeft">
                    <img src="./assets/img/services/learningapps.png" alt="LearningApps" class="info-card-img">
                    <p class="text-regular">Вправи: LearningApps</p>
                </div>
                <div class="info-card wow fadeInUp">
                    <img src="./assets/img/services/gynzy.png" alt="Gynzy" class="info-card-img">
                    <p class="text-regular">Вправи: Gynzy</p>
                </div>
                <div class="info-card wow fadeInRight">
                    <img src="./assets/img/services/methods.png" alt="Методики" class="info-card-img">
                    <p class="text-regular">
                        Пояснення через побут, предмети, картинки, символи. Віртуальні рахівниці, блоки, мнемотехніки,
                        схеми, шаблони, асоціації.
                    </p>
                </div>
            </div>
        </section>

        <!-- Умови -->
        <section class="service-section service-section--3">
            <div class="service-section__icon wow fadeInLeft">
                <img src="./assets/img/services/laptop.png" alt="icon" class="service-icon service-icon--big">
            </div>
            <div class="service-section__content wow fadeInRight">
                <h2 class="section-title">Умови участі</h2>
                <p class="text-regular">
                    Для повноцінної участі дитині потрібен ноутбук або комп’ютер із мишкою. Планшети та телефони не
                    підходять.
                </p>
            </div>
        </section>

        <!-- SIGN UP -->
        <?php include('./includes/sign-form.php') ?>
    </main>

    <!-- FOOTER -->
    <?php include('./includes/footer.php') ?>

    <script src="./scripts/main.js"></script>
    <script src="./scripts/form-validation.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>