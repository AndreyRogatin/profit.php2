<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Article</title>
</head>
<body>
<h3>Добавить новость</h3>
<form action="<?php echo $action ?? '/App/Controllers/SaveArticle/action'; ?>" method="post">
    Заголовок<br>
    <input type="text" name="title" size="100" required>
    <br>Текст<br>
    <textarea name="body" cols="100" rows="20" required></textarea>
    <br>Источник<br>
    <input type="text" name="source" required>
    <button type="submit">Отправить</button>
</form>
</body>
</html>