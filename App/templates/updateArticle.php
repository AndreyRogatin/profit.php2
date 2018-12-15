<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Article</title>
</head>
<body>
<h3>Редактировать новость</h3>
<form action="/SaveArticle" method="post">
    Заголовок<br>
    <input type="text" name="title" size="100" value="<?php echo $article->title; ?>" required>
    <br>Текст<br>
    <textarea name="body" cols="100" rows="20" required><?php echo $article->body; ?></textarea>
    <br>Источник<br>
    <input type="text" name="source" value="<?php echo $article->author->name; ?>" required>
    <input type="hidden" name="id" value="<?php echo $article->id; ?>">
    <button type="submit">Отправить</button>
</form>
</body>
</html>