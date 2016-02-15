<?php
/**
 * @var yii\web\View $this
 * @var app\models\Tag $modelTag
 */

$this->title = 'CRUD Tags';
?>

<h1>Просмотр информации по книге</h1>

<p>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-tag/index']); ?>">Управление</a>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-tag/create']); ?>">Добавить</a>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-tag/update', 'id' => $modelTag->id]); ?>">Изменить</a>
</p>

<?= yii\widgets\DetailView::widget([
    'model' => $modelTag,
    'attributes' => [
        'id',
        'title',
        'alias',
    ],
]);
?>

