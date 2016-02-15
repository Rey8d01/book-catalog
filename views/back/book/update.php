<?php
/**
 * @var yii\web\View $this
 * @var app\models\Book $modelBook
 */

$this->title = 'CRUD Books';
?>

<h1>Изменение информации по книге</h1>

<p>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-book/index']); ?>">Управление</a>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-book/create']); ?>">Добавить</a>
</p>

<?= $this->render('/back/book/_form', ['modelBook' => $modelBook]); ?>

