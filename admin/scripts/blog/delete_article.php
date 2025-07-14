<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo "Доступ заборонено.";
    exit;
}

require "../../../connect.php";

$id = intval($_POST['id'] ?? 0);

if ($id) {
    // 1. Отримати ім'я фото
    $stmt = $conn->prepare("SELECT image_name FROM blog_post WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imageName);
    $stmt->fetch();
    $stmt->close();

    // 2. Видалити фото з папки, якщо існує
    if ($imageName) {
        $filePath = '../../../uploads/blog/' . $imageName;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // 3. Видалити статтю з БД
    $stmt = $conn->prepare("DELETE FROM blog_post WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "Стаття успішно видалена!";
} else {
    echo "Невірний ID статті.";
}
?>