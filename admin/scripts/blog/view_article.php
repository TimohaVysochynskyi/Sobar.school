<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo "Доступ заборонено.";
    exit;
}

require "../../../connect.php";

$id = intval($_GET['id'] ?? 0);
if ($id) {
    $stmt = $conn->prepare("SELECT * FROM blog_post WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $article = $result->fetch_assoc();

    if ($article) {
        echo json_encode($article);
    } else {
        echo "Стаття не знайдена.";
    }
} else {
    echo "Невірний ID статті.";
}
?>