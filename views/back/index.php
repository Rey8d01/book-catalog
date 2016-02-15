<?php

/* @var $this yii\web\View */



$this->title = 'CRUD';
?>

<h1>Панель управления</h1>

<div class="row">
    <div class="col-md-4 text-center">
        <p>
            <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-book/index']); ?>">Книги</a>
            <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-tag/index']); ?>">Метки</a>
            <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-author/index']); ?>">Авторы</a>
        </p>
    </div>
</div>
