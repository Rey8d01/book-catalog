<?php
/**
 * @var yii\web\View $this
 * @var app\models\Tag $modelTag
 */

$this->title = 'CRUD Tags';
?>

<h1>Добавление новой книги</h1>

<p>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-tag/index']); ?>">Управление</a>
</p>

<?= $this->render('/back/tag/_form', ['modelTag' => $modelTag]); ?>

