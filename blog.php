<?php
require_once './connect.php';

// --- Пагінація ---
$perPage = 3;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $perPage;

// --- Отримати кількість постів ---
$totalRes = $conn->query("SELECT COUNT(*) FROM blog_post");
$totalPosts = $totalRes->fetch_row()[0];
$totalPages = ceil($totalPosts / $perPage);

// --- Отримати пости з кількістю коментарів ---
$sql = "SELECT bp.id, bp.title, bp.description, bp.date, 
               (SELECT COUNT(*) FROM blog_comment WHERE post_id = bp.id) as comments_count
        FROM blog_post bp
        ORDER BY bp.date DESC
        LIMIT $perPage OFFSET $offset";
$res = $conn->query($sql);
$posts = $res->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог | SOBAR.SCHOOL</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./styles/index.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/blog.css?time=<?php echo time(); ?>">

    <link rel="stylesheet" href="./styles/header.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/footer.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/sign-form.css?time=<?php echo time(); ?>">

    <link rel="stylesheet" href="./styles/responsive.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/animate.css?time=<?php echo time(); ?>">
</head>

<body>
    <!-- HEADER -->
    <?php include('./includes/header.php') ?>

    <main class="container">
        <!-- Blog Header -->
        <section class="blog-header wow fadeInDown">
            <h1 class="section-title">Блог</h1>
            <p class="text-regular">Корисні статті, поради та історії для батьків і педагогів про навчання, розвиток та
                підтримку дітей з ООП.</p>
        </section>

        <!-- Blog Post List -->
        <section class="post-list">
            <?php if (count($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <article class="blog-post-card wow fadeInLeft">
                        <header>
                            <h2 class="blog-post-title">
                                <a href="blog_post.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a>
                            </h2>
                        </header>
                        <div class="blog-post-meta">
                            <time datetime="<?= date('Y-m-d', strtotime($post['date'])) ?>" class="blog-post-date">
                                <?= date('d.m.Y', strtotime($post['date'])) ?>
                            </time>
                            <span class="blog-post-comments">💬 <?= $post['comments_count'] ?>
                                коментар<?= ($post['comments_count'] == 1 ? '' : 'і') ?></span>
                        </div>
                        <p class="blog-post-excerpt"><?= htmlspecialchars($post['description']) ?></p>
                        <a href="blog_post.php?id=<?= $post['id'] ?>" class="button blog-post-readmore">Читати далі…</a>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Поки що немає жодної статті.</p>
            <?php endif; ?>
        </section>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
            <nav class="pagination wow fadeInRight" aria-label="Навігація сторінками блогу">
                <ul>
                    <li>
                        <a href="?page=<?= max(1, $page - 1) ?>" class="pagination-prev" aria-label="Попередня сторінка"
                            <?= ($page == 1 ? 'style="pointer-events:none;opacity:.5;"' : '') ?>>←</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li>
                            <a href="?page=<?= $i ?>" class="pagination-page<?= ($i == $page ? ' active' : '') ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li>
                        <a href="?page=<?= min($totalPages, $page + 1) ?>" class="pagination-next"
                            aria-label="Наступна сторінка"
                            <?= ($page == $totalPages ? 'style="pointer-events:none;opacity:.5;"' : '') ?>>→</a>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>

        <!-- SIGN UP -->
        <?php include('./includes/sign-form.php'); ?>
    </main>

    <!-- FOOTER -->
    <?php include('./includes/footer.php') ?>

    <script src="./scripts/main.js"></script>
    <script src="./scripts/form-validation.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>