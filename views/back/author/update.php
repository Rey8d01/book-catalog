<?php
/**
 * @var yii\web\View $this
 * @var app\models\Author $modelAuthor
 */

$this->title = 'CRUD Authors';
?>

<h1>Изменение информации по автору</h1>

<p>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-author/index']); ?>">Управление</a>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-author/create']); ?>">Добавить</a>
</p>

<?= $this->render('/back/author/_form', ['modelAuthor' => $modelAuthor]); ?>

