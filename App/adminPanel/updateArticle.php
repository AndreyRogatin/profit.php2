<?php

use App\Models\Article;

require __DIR__ . '/../../autoload.php';

if (empty($_GET['id'])) {
    header('Location: /App/adminPanel/');
}

$article = Article::findById(abs((int)$_GET['id']));

?>

<h3>Редактировать новость</h3>
<form action="/App/adminPanel/saveArticle.php" method="post">Заголовок<br>
    <input type="text" name="title" size="100" value="<?php echo $article->title; ?>" required>
    <br>Текст<br>
    <textarea name="body" cols="100" rows="20" required><?php echo $article->body; ?></textarea>
    <br>Источник<br>
    <input type="text" name="source" value="<?php echo $article->author->name; ?>" required>
    <input type="hidden" name="id" value="<?php echo $article->id; ?>">
    <button type="submit">Отправить</button>
</form>
