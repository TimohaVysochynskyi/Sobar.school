<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ./login.php");
    exit;
}

// Визначення вибраної сторінки
$page = $_GET['page'] ?? '';
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobar.school | Адмін-панель</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Хедер -->
    <header class="bg-indigo-600 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-xl font-bold">Адмін-панель SOBAR.school</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li>
                        <a href="?page=blog" class="hover:underline">Блог</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Контейнер -->
    <main class="container mx-auto px-4 py-8">
        <?php if ($page === 'blog'): ?>
            <?php include 'blog.php'; ?>
        <?php else: ?>
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4">Ласкаво просимо до адмін-панелі!</h2>
                <p class="text-gray-700">Оберіть функцію в хедері, щоб почати роботу.</p>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>