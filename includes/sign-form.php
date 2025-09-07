<section class="sign">
    <div class="sign__col wow fadeInLeft">
        <img src="./assets/img/sign-img.webp" alt="Запис на консультацію" class="sign__img">
    </div>
    <div class="sign__col">
        <div id="sign" style="position: relative; top: -120px"></div>

        <form action="./scripts/send-form.php" method="post" id="contactForm" class="sign__form-wrapper" novalidate>
            <h3 class="section-title wow fadeInDown">Запис</h3>

            <div class="sign__form">
                <input class="sign__form-input wow bounceInLeft" type="text" id="name" name="name" placeholder="Ім'я"
                    required>
                <input class="sign__form-input wow bounceInRight" type="text" id="phone" name="phone"
                    placeholder="Номер телефону" required>
                <input class="sign__form-input wow bounceInLeft" type="number" id="age" name="age" min="1" max="30"
                    placeholder="Вік дитини" required>
                <textarea class="sign__form-input sign__form-textarea wow bounceInRight" id="interest" name="interest"
                    placeholder="Що вас цікавить?" required></textarea>
                <input class="sign__form-input wow bounceInLeft" type="text" id="time" name="time"
                    placeholder="Бажаний час для консультації" required>
                <p id="formStatus"></p>
            </div>

            <button class="purple-btn wow fadeInUp" type="submit">Записатися на консультацію</button>
        </form>
    </div>
</section>