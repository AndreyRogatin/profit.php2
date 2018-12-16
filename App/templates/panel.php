<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
</head>
<body>
<p><a href="/">На главную</a></p>
<hr>
<h2>Админ Панель</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>Заголовок новости</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($articles as $article) { ?>
        <tr>
            <td><?php echo $article->title; ?></td>
            <td>
                <a href="/Panel/index.php?ctrl=ArticleEditor&act=delete&id=<?php echo $article->id; ?>">Удалить</a>
            </td>
            <td>
                <a href="/Panel/index.php?ctrl=ArticleEditor&act=update&id=<?php echo $article->id; ?>">Редактировать</a>
            </td>
        </tr>
    <?php } ?>
</table>
<p><a href="/Panel/index.php?ctrl=ArticleEditor&act=create">Добавить новость</a></p>
</body>
</html>