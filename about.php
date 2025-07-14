<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOBAR.SCHOOL | Про нас</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./styles/index.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/about.css?time=<?php echo time(); ?>">

    <link rel="stylesheet" href="./styles/header.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/footer.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/sign-form.css?time=<?php echo time(); ?>">

    <link rel="stylesheet" href="./styles/responsive.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/animate.css?time=<?php echo time(); ?>">
</head>

<body>
    <!-- HEADER -->
    <?php include('./includes/header.php') ?>

    <main class="container custom-container">
        <aside class="timeline-wrapper">
            <div class="timeline-line"></div>
        </aside>

        <div class="about-container">
            <!-- Story Section -->
            <section class="about story">
                <div class="story__row">
                    <div class="timeline-block">
                        <div class="timeline-point-line"></div>
                        <div class="timeline-point wow fadeInLeft"></div>
                    </div>
                    <div class="story__col wow fadeInLeft">
                        <h2 class="section-title">Моя історія</h2>
                        <br>
                        <p class="text-regular story__text">
                            Мій шлях у корекційній педагогіці почався з мого власного сина. У першому класі йому
                            діагностували дислексію — і це повністю змінило моє життя. У ті часи майже не було
                            україномовних матеріалів на цю тему, тож я вчилась сама: перекладала англомовні джерела,
                            адаптувала вправи, створювала свої власні. Він був моїм першим і найважливішим учнем.
                        </p>
                    </div>
                    <div class="story__col">
                        <img src="./assets/img/author-img.webp" alt="Засновниця SOBAR.SCHOOL"
                            class="story__img wow fadeInRight">
                    </div>
                </div>
                <div class="story__row">
                    <div class="timeline-block">
                        <div class="timeline-point-line"></div>
                        <div class="timeline-point wow fadeInLeft"></div>
                    </div>
                    <p class="text-regular story__text wow fadeInLeft">
                        У 2016 році я створила першу україномовну Facebook-спільноту, присвячену дислексії. Там я
                        публікувала наукові статті, які перекладала з англійської, ділилась досвідом, методиками,
                        підтримувала батьків, які залишались сам на сам із викликами.
                    </p>
                </div>
                <div class="story__row">
                    <div class="timeline-block">
                        <div class="timeline-point-line"></div>
                        <div class="timeline-point wow fadeInLeft"></div>
                    </div>
                    <p class="text-regular story__text wow fadeInLeft">
                        Я працювала вчителем біології 9 років, а останні 4 — також асистентом учителя та корекційним
                        педагогом. Працюючи з дітьми з особливими освітніми потребами, я дійшла одного важливого
                        висновку: дітям потрібне середовище, де їх розуміють. Де не змушують втиснутись у рамки, а
                        допомагають знайти свій шлях до знань.
                    </p>
                </div>
            </section>

            <!-- Why SOBAR.SCHOOL Section -->
            <section class="about why wow fadeInUp">
                <h3 class="section-title">Чому я створила SOBAR.SCHOOL</h3>
                <br>
                <p class="text-regular why__text">
                    На жаль, сучасна державна освіта в Україні часто не дає дітям з особливими освітніми потребами
                    доступу
                    до професійної допомоги, тому я створила SOBAR.SCHOOL — онлайн-простір для дітей з дислексією,
                    дисграфією, дискалькулією та іншими труднощами з навчанням. Простір, де кожна дитина отримає
                    корекційну
                    допомогу на основі доказових наукових методів, у зручному інтерактивному форматі.
                    <br><br>
                    Я вірю: кожна дитина має право вчитися з радістю. І я роблю все, аби це стало реальністю.
                </p>
            </section>

            <!-- SIGN UP -->
            <?php include('./includes/sign-form.php') ?>
        </div>



    </main>
    <br><br>

    <!-- FOOTER -->
    <?php include('./includes/footer.php') ?>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const timelineLine = document.querySelector('.timeline-line');
            const storySection = document.querySelector('.story');

            // Set the height of the timeline line based on the sections
            const storyHeight = storySection.offsetHeight;

            timelineLine.style.height = `${storyHeight - 250}px`;
        });
    </script>

    <script src="./scripts/main.js"></script>
    <script src="./scripts/form-validation.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>