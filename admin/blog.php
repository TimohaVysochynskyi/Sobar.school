<?php

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ./login.php");
    exit;
}

require "../connect.php";

$result = $conn->query("SELECT id, title, description, DATE_FORMAT(date, '%Y-%m-%d %H:%i:%s') AS formatted_date FROM blog_post ORDER BY date DESC");
$articles = $result->fetch_all(MYSQLI_ASSOC);
?>
<div>
    <h1 class="text-2xl font-bold mb-6">Керування блогом</h1>

    <!-- Список статей -->
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">№</th>
                <th class="border border-gray-300 px-4 py-2">Заголовок</th>
                <th class="border border-gray-300 px-4 py-2">Опис</th>
                <th class="border border-gray-300 px-4 py-2">Дата</th>
                <th class="border border-gray-300 px-4 py-2">Дії</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $index => $article): ?>
                <tr class="bg-white">
                    <td class="border border-gray-300 px-4 py-2"><?= $index + 1 ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($article['title']) ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($article['description']) ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($article['formatted_date']) ?></td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button class="text-blue-500 hover:underline"
                            onclick="viewArticle(<?= $article['id'] ?>)">Переглянути</button>
                        <button class="text-yellow-500 hover:underline"
                            onclick="editArticle(<?= $article['id'] ?>)">Редагувати</button>
                        <button class="text-red-500 hover:underline"
                            onclick="deleteArticle(<?= $article['id'] ?>)">Видалити</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Кнопка для відкриття попап-форми -->
    <button class="mt-6 bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300"
        onclick="openPopup()">Додати статтю</button>

    <!-- Попап-форма додавання -->
    <div id="popup" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto relative">
            <button type="button" onclick="closePopup()"
                class="absolute top-3 right-3 text-gray-500 text-2xl hover:text-gray-700 z-10">&times;</button>
            <h2 class="text-xl font-bold mb-4">Додати нову статтю</h2>
            <form id="addArticleForm" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Заголовок:</label>
                    <input type="text" name="title" id="title" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Опис:</label>
                    <textarea name="description" id="description" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-y min-h-[60px]"></textarea>
                </div>
                <div class="mb-4">
                    <label for="text" class="block text-sm font-medium text-gray-700">Текст:</label>
                    <textarea name="text" id="text" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-y min-h-[120px]"></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Фотографія:</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button"
                        class="bg-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-400 transition duration-300"
                        onclick="closePopup()">Скасувати</button>
                    <button type="submit"
                        class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">Додати</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Попап для редагування статті -->
    <div id="editPopup" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto relative">
            <button type="button" onclick="closeEditPopup()"
                class="absolute top-3 right-3 text-gray-500 text-2xl hover:text-gray-700 z-10">&times;</button>
            <h2 class="text-xl font-bold mb-4">Редагувати статтю</h2>
            <form id="editArticleForm" enctype="multipart/form-data">
                <input type="hidden" name="id" id="editId">
                <div class="mb-4">
                    <label for="editTitle" class="block text-sm font-medium text-gray-700">Заголовок:</label>
                    <input type="text" name="title" id="editTitle" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="editDescription" class="block text-sm font-medium text-gray-700">Опис:</label>
                    <textarea name="description" id="editDescription" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-y min-h-[60px]"></textarea>
                </div>
                <div class="mb-4">
                    <label for="editText" class="block text-sm font-medium text-gray-700">Текст:</label>
                    <textarea name="text" id="editText" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-y min-h-[120px]"></textarea>
                </div>
                <div class="mb-4">
                    <label for="editImage" class="block text-sm font-medium text-gray-700">Фотографія:</label>
                    <input type="file" name="image" id="editImage" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <img id="editImagePreview" src="" alt="Прев'ю зображення"
                        class="w-full h-auto mt-4 rounded-lg max-h-48 object-contain">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button"
                        class="bg-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-400 transition duration-300"
                        onclick="closeEditPopup()">Скасувати</button>
                    <button type="submit"
                        class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">Зберегти</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Попап для перегляду статті -->
    <div id="viewPopup" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto relative">
            <button type="button" onclick="closeViewPopup()"
                class="absolute top-3 right-3 text-gray-500 text-2xl hover:text-gray-700 z-10">&times;</button>
            <h2 id="viewTitle" class="text-xl font-bold mb-4"></h2>
            <p id="viewDescription" class="text-gray-700 mb-4"></p>
            <img id="viewImage" src="" alt="Зображення статті" class="w-full h-auto mb-4 rounded-lg max-h-64 object-contain">
            <p id="viewText" class="text-gray-700"></p>
        </div>
    </div>
</div>

<script>
    // Відкриття попап-форми
    function openPopup() {
        document.getElementById('popup').classList.remove('hidden');
    }

    // Закриття попап-форми
    function closePopup() {
        document.getElementById('popup').classList.add('hidden');
    }

    // Додавання статті через AJAX
    document.getElementById('addArticleForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('scripts/blog/add_article.php', {
            method: 'POST',
            body: formData
        })
            .then(data => data.text())
            .then(data => {
                alert(data);
                location.reload(); // Оновлення сторінки після успішного додавання
            })
            .catch(error => {
                console.error('Помилка:', error);
                alert('Помилка при додаванні статті');
            });
    });

    // Перегляд статті через попап
    function viewArticle(id) {
        fetch(`scripts/blog/view_article.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('viewTitle').textContent = data.title;
                document.getElementById('viewDescription').textContent = data.description;
                document.getElementById('viewText').textContent = data.text;
                document.getElementById('viewImage').src = `../uploads/blog/${data.image_name}`;
                document.getElementById('viewPopup').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Помилка:', error);
                alert('Помилка при перегляді статті');
            });
    }

    // Закриття попапу перегляду
    function closeViewPopup() {
        document.getElementById('viewPopup').classList.add('hidden');
    }

    // Відкриття попапу редагування
    function editArticle(id) {
        fetch(`scripts/blog/view_article.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('editId').value = data.id;
                document.getElementById('editTitle').value = data.title;
                document.getElementById('editDescription').value = data.description;
                document.getElementById('editText').value = data.text;
                document.getElementById('editImagePreview').src = `../uploads/blog/${data.image_name}`;
                document.getElementById('editPopup').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Помилка:', error);
                alert('Помилка при завантаженні даних для редагування');
            });
    }

    // Закриття попапу редагування
    function closeEditPopup() {
        document.getElementById('editPopup').classList.add('hidden');
    }

    // Редагування статті через AJAX
    document.getElementById('editArticleForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('scripts/blog/edit_article.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                alert(data);
                location.reload();
            })
            .catch(error => {
                console.error('Помилка:', error);
                alert('Помилка при редагуванні статті');
            });
    });

    // Видалення статті
    function deleteArticle(id) {
        if (confirm('Ви впевнені, що хочете видалити цю статтю?')) {
            const formData = new FormData();
            formData.append('id', id);

            fetch('scripts/blog/delete_article.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload();
                })
                .catch(error => {
                    console.error('Помилка:', error);
                    alert('Помилка при видаленні статті');
                });
        }
    }
</script>