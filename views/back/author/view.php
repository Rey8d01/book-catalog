<?php
/**
 * @var yii\web\View $this
 * @var app\models\Author $modelAuthor
 */

$this->title = 'CRUD Authors';
?>

<h1>Просмотр информации по автору</h1>

<p>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-author/index']); ?>">Управление</a>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-author/create']); ?>">Добавить</a>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-author/update', 'id' => $modelAuthor->id]); ?>">Изменить</a>
</p>

<?= yii\widgets\DetailView::widget([
    'model' => $modelAuthor,
    'attributes' => [
        'id',
        'name',
        'description',
        'photo',
    ],
]);
?>

