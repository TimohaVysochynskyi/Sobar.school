<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo "Доступ заборонено.";
    exit;
}

require "../../../connect.php";

$id = intval($_POST['id'] ?? 0);
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$text = $_POST['text'] ?? '';
$image = $_FILES['image'] ?? null;

if ($id && $title && $description && $text) {
    if ($image && $image['tmp_name']) {
        // 1. Отримати старе ім'я фото
        $stmt = $conn->prepare("SELECT image_name FROM blog_post WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($oldImageName);
        $stmt->fetch();
        $stmt->close();

        // 2. Видалити старе фото, якщо існує
        if ($oldImageName) {
            $oldFilePath = '../../../uploads/blog/' . $oldImageName;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        // 3. Додати нове фото
        $imageName = time() . '_' . basename($image['name']);
        $uploadDir = '../../../uploads/blog/';
        $uploadFile = $uploadDir . $imageName;

        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
            $stmt = $conn->prepare("UPDATE blog_post SET title = ?, description = ?, text = ?, image_name = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $title, $description, $text, $imageName, $id);
        } else {
            echo "Помилка при завантаженні фотографії.";
            exit;
        }
    } else {
        $stmt = $conn->prepare("UPDATE blog_post SET title = ?, description = ?, text = ? WHERE id = ?");
        $stmt->bind_param("sssi", $title, $description, $text, $id);
    }

    $stmt->execute();
    echo "Стаття успішно оновлена!";
} else {
    echo "Всі поля обов'язкові для заповнення.";
}
?>