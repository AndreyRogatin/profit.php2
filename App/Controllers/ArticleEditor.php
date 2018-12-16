<?php

namespace App\Controllers;


use App\Models\Author;
use App\Models\Article as ArticleModel;

class ArticleEditor extends Controller
{

    public function handle()
    {

    }

    public function create()
    {
        $this->view->action = '/Panel/index.php?ctrl=ArticleEditor&act=save';
        $this->view->display(__DIR__ . '/../templates/createArticle.php');
    }

    public function update()
    {
        $this->view->action = '/Panel/index.php?ctrl=ArticleEditor&act=save';
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../templates/updateArticle.php');
    }

    public function delete()
    {
        if (!empty($_GET['id'])) {
            $article = ArticleModel::findById($_GET['id']);
            $article->delete();
        }

        header('Location: /Panel/index.php');
    }

    public function save()
    {
        if (!empty($_POST)) {

            $author = Author::findByName($_POST['source']);
            if (!isset($author)) {
                $author = new Author;
                $author->name = $_POST['source'];
                $author->save();
            }

            $article = new ArticleModel;
            $article->title = $_POST['title'];
            $article->body = $_POST['body'];
            $article->author = $author;
            $article->id = $_POST['id'] ?? null;
            $article->save();
        }

        header('Location: /Panel/index.php');
    }
}