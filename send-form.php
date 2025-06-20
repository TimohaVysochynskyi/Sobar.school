<?php
// Налаштування
$to = "your@email.com"; // адреса, куди надсилати заявки
$subject = "Нова заявка з сайту SOBAR.SCHOOL";

// Захист від XSS
function sanitize($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize($_POST["name"] ?? '');
    $email = sanitize($_POST["email"] ?? '');
    $age = sanitize($_POST["age"] ?? '');
    $interest = sanitize($_POST["interest"] ?? '');
    $time = sanitize($_POST["time"] ?? '');

    if ($name && $email && $age && $interest && $time) {
        $message = "Ім’я: $name\nEmail/Телефон: $email\nВік дитини: $age\nЩо цікавить: $interest\nБажаний час: $time";
        $headers = "From: no-reply@sobar.school";

        if (mail($to, $subject, $message, $headers)) {
            echo "Дякуємо! Ми зв’яжемося з вами найближчим часом.";
        } else {
            echo "Помилка при надсиланні. Спробуйте пізніше.";
        }
    } else {
        echo "Будь ласка, заповніть усі поля.";
    }
} else {
    header("Location: index.html");
    exit;
}
?>