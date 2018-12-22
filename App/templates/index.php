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
{% for article in news %}
    <hr>
    <h3>
        <a href="/App/Controllers/Article/action/?id={{ article.id }}">
            {{ article.title }}
        </a>
    </h3>
    <article>{{ article.body }}</article>
    <p>
        <i>{{ article.author.name }}</i>
    </p>
{% endfor %}
</body>
</html>