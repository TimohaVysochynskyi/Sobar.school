<?php
// Налаштування
$to = "verasobar@gmail.com"; // адреса, куди надсилати заявки
$subject = "Запис на консультацію з сайту SOBAR.school";

// Захист від XSS
function sanitize($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize($_POST["name"] ?? '');
    $phone = sanitize($_POST["phone"] ?? '');
    $age = sanitize($_POST["age"] ?? '');
    $interest = sanitize($_POST["interest"] ?? '');
    $time = sanitize($_POST["time"] ?? '');

    if ($name && $phone && $age && $interest && $time) {
        $message = "Ім’я: $name\nТелефон: $phone\nВік дитини: $age\nЩо цікавить: $interest\nБажаний час: $time";
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
    header("Location: ./");
    exit;
}
?>