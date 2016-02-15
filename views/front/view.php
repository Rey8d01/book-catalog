<?php
/**
 * @var yii\web\View $this
 * @var app\models\Book $modelBook
 */

use yii\helpers\Html;

$title = $modelBook->title;

$description = $modelBook->description;
$photo = $modelBook->photo ? Html::img($modelBook->photo) : '';

$authors = array_map(function ($modelAuthor) {
    /** @var app\models\Author $modelAuthor */
    return $modelAuthor->name;
}, $modelBook->authors);
$authors = join(', ', $authors);

$tags = array_map(function ($modelTag) {
    /** @var app\models\Tag $modelTag */
    return $modelTag->title;
}, $modelBook->tags);
$tags = join(', ', $tags);
?>

<div class="row">
    <div class="col-md-12">
        <h3><?= $title; ?></h3>
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
