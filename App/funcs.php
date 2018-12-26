<?php

return [
    'getId' => function(object $model) {
        return $model->id;
    },
    'getTitle' => function(object $model) {
        return $model->title;
    },
    'getAuthor' => function(object  $model) {
        return $model->author->name;
    },
    'getDeleteLink' => function(object $model) {
        return '<a href="/Panel/index.php?ctrl=ArticleEditor&act=delete&id=' . $model->id . '">Удалить</a>';
    },
    'getUpdateLink' => function(object $model) {
        return '<a href="/Panel/index.php?ctrl=ArticleEditor&act=update&id=' . $model->id . '">Редактировать</a>';
    }
];