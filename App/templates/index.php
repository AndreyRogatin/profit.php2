<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
</head>
<body>
<p><a href="/Panel/index.php">Admin Panel</a></p>
<hr>
<h2>Последние новости</h2>
<?php foreach ($news as $article) : ?>
    <hr>
    <h3>
        <a href="/article/?id=<?php echo $article->id; ?>">
            <?php echo $article->title; ?>
        </a>
    </h3>
    <article><?php echo $article->body; ?></article>
    <p>
        <i>
            <?php
            if (isset($article->author->name)) {
                echo $article->author->name;
            }
            ?>
        </i>
    </p>
<?php endforeach; ?>
</body>
</html>