<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
</head>
<body>
<h2><?php echo $article->title; ?></h2>
<article><?php echo $article->body; ?></article>
<p>
    <?php
    if (isset($article->author->name)) {
        echo $article->author->name;
    }
    ?>
</p>
</body>
</html>