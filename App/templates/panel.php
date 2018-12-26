<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <style>
        table {
            border: 1px solid #555;
            border-collapse: collapse;
        }
        td {
            border: 1px solid #777;
            padding: 5px;
        }
    </style>
</head>
<body>
<p><a href="/">На главную</a></p>
<hr>
<h2>Админ Панель</h2>
<?php echo $table; ?>
<p><a href="/Panel/index.php?ctrl=ArticleEditor&act=create">Добавить новость</a></p>
</body>
</html>