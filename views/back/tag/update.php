<?php
/**
 * @var yii\web\View $this
 * @var app\models\Tag $modelTag
 */

$this->title = 'CRUD Tags';
?>

<h1>Изменение информации по книге</h1>

<p>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-tag/index']); ?>">Управление</a>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-tag/create']); ?>">Добавить</a>
</p>

<?= $this->render('/back/tag/_form', ['modelTag' => $modelTag]); ?>

