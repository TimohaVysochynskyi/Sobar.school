<?php
require_once './connect.php';

$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// --- Отримати статтю ---
$stmt = $conn->prepare("SELECT * FROM blog_post WHERE id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$res = $stmt->get_result();
$post = $res->fetch_assoc();

if (!$post) {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>Стаття не знайдена</h1>";
    exit;
}

// --- Додати коментар ---
$comment_error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['author'], $_POST['comment'])) {
    $author = trim($_POST['author']);
    $comment = trim($_POST['comment']);
    if ($author && $comment) {
        $stmt = $conn->prepare("INSERT INTO blog_comment (post_id, author, comment) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $post_id, $author, $comment);
        $stmt->execute();
        header("Location: blog_post.php?id=$post_id#comments");
        exit;
    } else {
        $comment_error = "Введіть ім'я та коментар.";
    }
}

// --- Отримати коментарі ---
$stmt = $conn->prepare("SELECT * FROM blog_comment WHERE post_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$comments = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']) ?> | SOBAR.SCHOOL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./styles/index.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/blog.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/header.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/footer.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/sign-form.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/responsive.css?time=<?php echo time(); ?>">
    <style>
        /* --- Верх статті --- */
        .blog-post-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 24px;
            margin-bottom: 32px;
        }

        .blog-post-head .section-title {
            font-size: 38px;
            font-family: "Montserrat Alternates SemiBold", sans-serif;
            color: #000;
            margin-bottom: 0;
            line-height: 1.1;
        }

        .blog-post-head .blog-post-date {
            font-size: 18px;
            color: #6c5ce7;
            font-family: "Montserrat Alternates Medium", sans-serif;
            white-space: nowrap;
        }

        /* --- Тіло статті --- */
        .blog-post-body {
            display: block;
            margin-bottom: 48px;
            overflow: hidden;
        }

        .blog-post-image {
            float: right;
            width: 340px;
            max-width: 45%;
            margin: 0 0 18px 32px;
            border-radius: 22px;
            box-shadow: 2px 2px 8px rgba(167, 156, 238, 0.08);
            background: #fff;
        }

        .blog-post-description {
            font-size: 22px;
            color: #222;
            font-family: "Montserrat Alternates SemiBold", sans-serif;
            margin-bottom: 18px;
            margin-top: 0;
        }

        .blog-post-text {
            font-size: 18px;
            color: #222;
            line-height: 1.7;
            font-family: "Montserrat Alternates Regular", sans-serif;
            word-break: break-word;
        }

        @media (max-width: 900px) {
            .blog-post-head .section-title {
                font-size: 26px;
            }

            .blog-post-head .blog-post-date {
                font-size: 15px;
            }

            .blog-post-image {
                width: 180px;
                max-width: 60%;
                margin: 0 0 12px 16px;
                border-radius: 14px;
            }

            .blog-post-description {
                font-size: 17px;
            }

            .blog-post-text {
                font-size: 16px;
            }
        }

        @media (max-width: 600px) {
            .blog-post-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .blog-post-head .section-title {
                font-size: 18px;
            }

            .blog-post-head .blog-post-date {
                font-size: 12px;
            }

            .blog-post-image {
                float: none;
                display: block;
                width: 100%;
                max-width: 100%;
                margin: 0 0 14px 0;
            }

            .blog-post-description {
                font-size: 14px;
            }

            .blog-post-text {
                font-size: 14px;
            }
        }

        /* --- Коментарі --- */
        .blog-comments {
            margin-top: 40px;
        }

        .blog-comments .section-title {
            font-size: 1.5rem;
            margin-bottom: 18px;
        }

        .blog-comment-form {
            background: #fff;
            border: none;
            border-radius: 0;
            padding: 0;
            margin-bottom: 32px;
        }

        .blog-comment-form-fields {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }

        .blog-comment-form input,
        .blog-comment-form textarea {
            font-family: "Montserrat Alternates Regular", sans-serif;
            border-radius: 16px;
            border: 1.5px solid #e3d8fd;
            padding: 14px 20px;
            font-size: 16px;
            outline: none;
            color: #222;
            background: #f9f5f2;
            flex: 1 1 180px;
            min-width: 120px;
            transition: border-color 0.18s;
        }

        .blog-comment-form input:focus,
        .blog-comment-form textarea:focus {
            border-color: #6c5ce7;
        }

        .blog-comment-form textarea {
            min-height: 48px;
            resize: vertical;
            flex: 2 1 220px;
        }

        .blog-comment-form .blog-comment-submit {
            font-size: 17px;
            padding: 14px 32px;
            border-radius: 16px;
            margin-left: auto;
            margin-top: 0;
            font-family: "Montserrat Alternates SemiBold", sans-serif;
            background: #6c5ce7;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background 0.18s;
        }

        .blog-comment-form .blog-comment-submit:hover {
            background: #4b3bbd;
        }

        .comment-error {
            color: #e74c3c;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .blog-comment-list {
            list-style: none;
            padding: 0;
        }

        .blog-comment-item {
            margin-bottom: 18px;
            padding: 14px 18px;
            background: #f9f5f2;
            border-radius: 12px;
            border: 1px solid #e3d8fd;
        }

        .blog-comment-meta {
            font-size: 13px;
            color: #888;
            margin-bottom: 4px;
        }

        .blog-comment-author {
            font-weight: 600;
            color: #6c5ce7;
        }

        .blog-comment-date {
            margin-left: 10px;
        }

        .blog-comment-body {
            font-size: 16px;
            color: #222;
            font-family: "Montserrat Alternates Regular", sans-serif;
        }

        @media (max-width: 900px) {

            .blog-comment-form input,
            .blog-comment-form textarea {
                font-size: 14px;
                border-radius: 10px;
                padding: 10px 12px;
            }

            .blog-comment-form .blog-comment-submit {
                font-size: 14px;
                padding: 10px 18px;
                border-radius: 10px;
            }

            .blog-comment-list {
                max-width: 100%;
            }
        }

        @media (max-width: 600px) {
            .blog-comment-form-fields {
                flex-direction: column;
                gap: 10px;
            }

            .blog-comment-form input,
            .blog-comment-form textarea {
                font-size: 12px;
                border-radius: 8px;
                padding: 7px 8px;
            }

            .blog-comment-form .blog-comment-submit {
                font-size: 12px;
                padding: 7px 10px;
                border-radius: 8px;
            }
        }
    </style>
</head>

<body>
    <?php include('./includes/header.php'); ?>

    <main class="container">
        <section class="blog-post-full" style="margin-bottom: 40px;">
            <!-- Верх статті -->
            <div class="blog-post-head">
                <h1 class="section-title"><?= htmlspecialchars($post['title']) ?></h1>
                <time datetime="<?= date('Y-m-d', strtotime($post['date'])) ?>" class="blog-post-date">
                    <?= date('d.m.Y', strtotime($post['date'])) ?>
                </time>
            </div>
            <!-- Тіло статті -->
            <div class="blog-post-body clearfix">
                <?php if (!empty($post['image_name'])): ?>
                    <img src="uploads/blog/<?= htmlspecialchars($post['image_name']) ?>"
                        alt="<?= htmlspecialchars($post['title']) ?>" class="blog-post-image">
                <?php endif; ?>
                <div class="blog-post-description"><?= nl2br(htmlspecialchars($post['description'])) ?></div>
                <div class="blog-post-text"><?= nl2br(htmlspecialchars($post['text'])) ?></div>
            </div>
        </section>

        <!-- Коментарі -->
        <section class="blog-comments" id="comments">
            <h2 class="section-title">Коментарі</h2>
            <?php if ($comment_error): ?>
                <div class="comment-error"><?= htmlspecialchars($comment_error) ?></div>
            <?php endif; ?>
            <form method="post" class="blog-comment-form mb-8">
                <div class="blog-comment-form-fields">
                    <input type="text" name="author" placeholder="Ваше ім'я" required>
                    <textarea name="comment" placeholder="Ваш коментар" required></textarea>
                    <button type="submit" class="blog-comment-submit">Надіслати</button>
                </div>
            </form>
            <?php if (count($comments)): ?>
                <ul class="blog-comment-list">
                    <?php foreach ($comments as $c): ?>
                        <li class="blog-comment-item">
                            <div class="blog-comment-meta">
                                <span class="blog-comment-author"><?= htmlspecialchars($c['author']) ?></span>
                                <span class="blog-comment-date"><?= date('d.m.Y H:i', strtotime($c['created_at'])) ?></span>
                            </div>
                            <div class="blog-comment-body"><?= nl2br(htmlspecialchars($c['comment'])) ?></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="color:#888;">Коментарів поки немає. Будьте першим!</p>
            <?php endif; ?>
        </section>
    </main>

    <?php include('./includes/footer.php'); ?>

    <script src="./scripts/main.js"></script>
    <script src="./scripts/form-validation.js"></script>

</body>

</html>