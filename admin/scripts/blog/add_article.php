<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo "Доступ заборонено.";
    exit;
}

require "../../../connect.php";

$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$text = $_POST['text'] ?? '';
$image = $_FILES['image'] ?? null;

if ($title && $description && $text && $image) {
    $imageName = time() . '_' . basename($image['name']);
    $uploadDir = '../../../uploads/blog/';
    $uploadFile = $uploadDir . $imageName;

    if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
        $stmt = $conn->prepare("INSERT INTO blog_post (title, description, text, image_name, date) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $title, $description, $text, $imageName);
        $stmt->execute();
        echo "Стаття успішно додана!";
    } else {
        echo "Помилка при завантаженні фотографії.";
    }
} else {
    echo "Всі поля обов'язкові для заповнення.";
}
?>