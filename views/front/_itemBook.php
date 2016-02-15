<?php
/**
 * @var yii\web\View $this
 * @var app\models\Book $model
 * @var int $key
 * @var int $index
 * @var \yii\widgets\ListView $widget
 */

use yii\helpers\Html;

$title = $model->title;
$link = Html::a($title, ['front/view', 'alias' => $model->alias], ['data-pjax' => 0]);

$description = \yii\helpers\BaseStringHelper::truncateWords($model->description, 10);
$photo = $model->photo ? Html::img($model->photo) : '';

$authors = array_map(function ($modelAuthor) {
    /** @var app\models\Author $modelAuthor */
    return $modelAuthor->name;
}, $model->authors);
$authors = join(', ', $authors);

$tags = array_map(function ($modelTag) {
    /** @var app\models\Tag $modelTag */
    return $modelTag->title;
}, $model->tags);
$tags = join(', ', $tags);
?>

<div class="row">
    <div class="col-md-12">
        <h3><?= $link; ?></h3>
    </div>
    <div class="col-md-2 photo">
        <?= $photo; ?>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                Авторы: <?= $authors; ?>
            </div>
            <div class="col-md-12">
                Метки: <?= $tags; ?>
            </div>
            <div class="col-md-12">
                Описание: <?= $description; ?>
            </div>
        </div>
    </div>
</div>
