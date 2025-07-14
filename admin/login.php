<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: ./");
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    if ($password === '123456') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ./");
        exit;
    } else {
        $error = 'Невірний пароль';
    }
}
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід в адмін-панель</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <main class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Вхід в адмін-панель</h1>
        <form method="post" class="space-y-4">
            <div>
                <label for="password" class="block text-m font-medium text-gray-700 mb-2">Пароль:</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                Увійти
            </button>
            <?php if ($error): ?>
                <div class="text-red-500 text-sm text-center"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
        </form>
    </main>
</body>

</html>