<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOBAR.SCHOOL | Головна</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./styles/index.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/home.css?time=<?php echo time(); ?>">

    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/sign-form.css?time=<?php echo time(); ?>">

    <link rel="stylesheet" href="./styles/responsive.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/animate.css">

</head>

<body>
    <!-- HEADER -->
    <?php include('./includes/header.php') ?>

    <div class="hero">
        <p class="hero__title">
            Онлайн простір для допомоги дітям з особливими освітніми потребами
        </p>
        <a href="#sign" class="purple-btn">Записатися на консультацію</a>
    </div>

    <main class="container">

        <!-- ABOUT US -->
        <section class="about">
            <div class="about__col wow fadeInLeft">
                <img src="./assets/img/author-img.webp" alt="Про мене" class="about__img">
            </div>
            <div class="about__col wow fadeInRight">
                <h3 class="section-title">Наша місія та цінності</h3>
                <p class="text-regular about__text">Онлайн-простір корекції та розвитку створено, аби кожна дитина з
                    особливими освітніми потребами мала доступ до якісної, професійної допомоги, незалежно від місця
                    проживання. <br><br>Наша місія — забезпечити дітям підтримку,
                    якої їм часто бракує в реальних умовах шкільної системи.</p>
                <!-- <ul class="about__points-list">
                    <li class="about__points-item">
                        <div class="about__point-circle about__point-circle--1"></div>
                        <p class="about__point-text">Підтримка та розуміння</p>
                    </li>
                    <li class="about__points-item">
                        <div class="about__point-circle about__point-circle--2"></div>
                        <p class="about__point-text">Індивідуальний підхід</p>
                    </li>
                    <li class="about__points-item">
                        <div class="about__point-circle about__point-circle--3"></div>
                        <p class="about__point-text">Професійність</p>
                    </li>
                    <li class="about__points-item">
                        <div class="about__point-circle"></div>
                        <p class="about__point-text">Емпатія</p>
                    </li>
                </ul> -->
            </div>
        </section>

        <!-- SERVICES -->
        <section class="services">
            <div id="services" style="position: relative; top: -120px;"></div>
            <h3 class="section-title wow bounceInLeft">Наші послуги</h3>
            <ul class="services__list">
                <li class="services__item wow fadeInLeft">
                    <a href="./service-korekciyni-zanyattya" class="services__item-link services__item-link--1">
                        <img src="./assets/img/services/1.png" alt="Корекційно-розвиткові заняття"
                            class="services__item-img">
                        <div class="services__item-content">
                            <h4 class="services__item-title">Корекційно-розвиткові заняття</h4>
                            <p class="text-regular">Розвиток читання, письма, мовлення, логічного мислення, уваги,
                                пам’яті, просторових уявлень.</p>
                            <button class="services__item-btn purple-btn">Детальніше</button>
                        </div>

                    </a>
                </li>
                <li class="services__item wow fadeInUp">
                    <a href="./service-english" class="services__item-link services__item-link--2">
                        <img src="./assets/img/services/2.png" alt="Англійська мова з нуля для дітей з ООП"
                            class="services__item-img">
                        <div class="services__item-content">
                            <h4 class="services__item-title">Англійська мова з нуля для дітей з ООП</h4>
                            <p class="text-regular">Із затримкою мовлення, труднощами читання, уваги чи пам’яті.
                                Підходить для дітей, які ще не вивчали англійську або мають
                                негативний досвід у школі.</p>
                            <button class="services__item-btn purple-btn">Детальніше</button>
                        </div>
                    </a>
                </li>
                <li class="services__item wow fadeInUp">
                    <a href="./service-math" class="services__item-link services__item-link--3">
                        <img src="./assets/img/services/parents.png" alt="Курси для батьків" class="services__item-img">
                        <div class="services__item-content">
                            <h4 class="services__item-title">Математика для дітей з труднощами навчання</h4>
                            <p class="text-regular">З дискалькулією, труднощами з рахунком, абстрактним мисленням,
                                пам’яттю, увагою. Також — діти, яким важко засвоїти
                                шкільну математику звичним способом.</p>
                            <button class="services__item-btn purple-btn">Детальніше</button>
                        </div>
                    </a>
                </li>
                <!-- <li class="services__item wow fadeInRight">
                    <a href="" class="services__item-link services__item-link--4">
                        <img src="./assets/img/services/consultations.png" alt="Консультації"
                            class="services__item-img">
                        <div class="services__item-content">
                            <h4 class="services__item-title">Консультації</h4>
                            <p class="text-regular">Запишіться, щоб обговорити унікальні потреби вашої дитини та наші
                                пропозиції.</p>
                            <button class="services__item-btn purple-btn">Детальніше</button>
                        </div>
                    </a>
                </li> -->
            </ul>
        </section>

        <!-- FEEDBACKS -->
        <section class="feedbacks">
            <h3 class="section-title wow bounceInDown">Відгуки</h3>
            <ul class="feedbacks__list">
                <li class="feedbacks__item wow fadeInLeft">
                    <span class="feedbacks__item-date">09.06.2025</span><img src="./assets/img/feedbacks/1.png"
                        alt="Відгук від користувача 1" class="feedbacks__item-img">
                    <h4 class="feedbacks__item-name">Ольга</h4>
                    <p class="text-regular feedbacks__item-text">Добрий день, сьогодні Поля здала НМТ з нормальним (а як
                        для дитини з особливими освітніми потребами) з чудовим
                        результатом, вона, мабуть вам написала. Дякую вам за те що займалися з нею, це дало їй дуже
                        сильний поштовх і віру в
                        свої здібності) Без ваших занять не було б такого результату ♥️</p>
                </li>
                <li class="feedbacks__item wow fadeInUp">
                    <span class="feedbacks__item-date">13.02.2023</span><img src="./assets/img/feedbacks/2.png"
                        alt="Відгук від користувача 2" class="feedbacks__item-img">
                    <h4 class="feedbacks__item-name">Олеся</h4>
                    <p class="text-regular feedbacks__item-text">Хочу вам сказати величезне дякую. Матвій в суботу писав
                        твір. До занять з вами він би на це потратив цілий день і купу
                        моїх нервів. А так справився за 40 хвилин!!!!</p>
                </li>
                <li class="feedbacks__item wow fadeInRight">
                    <span class="feedbacks__item-date">22.02.2025</span><img src="./assets/img/feedbacks/3.png"
                        alt="Відгук від користувача 3" class="feedbacks__item-img">
                    <h4 class="feedbacks__item-name">Оксана</h4>
                    <p class="text-regular feedbacks__item-text">Мы давно не читали, а тут у Ивана появилась мотивация
                        почитать. <br>Изменилась скорость чтения, плюс больше стал читать интуитивно, а не каждую букву.
                        <br>Может читать сам, запоминает и пересказывает прочитанное. Осиливает бОльшее количество
                        страниц.
                    </p>
                </li>
                <li class="feedbacks__item wow fadeInRight">
                    <span class="feedbacks__item-date">19.07.2025</span><img src="./assets/img/feedbacks/4.png"
                        alt="Відгук від користувача 4" class="feedbacks__item-img">
                    <h4 class="feedbacks__item-name">Анна</h4>
                    <p class="text-regular feedbacks__item-text">
                        Вважаю, що нам дуже пощастило знайти фахівця такого рівня. Якщо чесно, я навіть не сподівалася
                        на аж настільки серйозні результати, які ми зараз маємо після кількох років корекційних занять -
                        не лише легкість читання (у нас дислексія), але й відчуття і розуміння мови, мовних структур і
                        зворотів, зацікавлення вивченням української і іноземних мов. Набагато більше, ніж я могла
                        очікувати від корекційних занять. Дуже вдячна і, звичайно, рекомендую!
                    </p>
                </li>
            </ul>
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