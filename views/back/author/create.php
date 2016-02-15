<?php
/**
 * @var yii\web\View $this
 * @var app\models\Author $modelAuthor
 */

$this->title = 'CRUD Authors';
?>

<h1>Добавление нового автора</h1>

<p>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-authors/index']); ?>">Управление</a>
</p>

<?= $this->render('/back/author/_form', ['modelAuthor' => $modelAuthor]); ?>

