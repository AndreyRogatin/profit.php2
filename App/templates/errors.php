<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Errors</title>
</head>
<body>
<h2><?php echo $title; ?></h2>
<table border="1" cellpadding="5">
    <caption>Информация об ошибке</caption>
    <tr>
        <td>Текст сообщения</td>
        <td><?php echo $ex->getMessage(); ?></td>
    </tr>
    <tr>
        <td>Код ошибки</td>
        <td><?php echo $ex->getCode(); ?></td>
    </tr>
    <tr>
        <td>Файл</td>
        <td><?php echo $ex->getFile(); ?></td>
    </tr>
    <tr>
        <td>Номер строки</td>
        <td><?php echo $ex->getLine(); ?></td>
    </tr>
</table>
</body>
</html>