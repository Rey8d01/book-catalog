<?php
/**
 * @var yii\web\View $this
 * @var app\models\Tag $modelTag
 * @var yii\data\ActiveDataProvider $dataProvider
 *
 * Панель управления книгами.
 */

use yii\helpers\Html;

$this->title = 'CRUD Tag';
?>

<h1>Управление книгами</h1>

<p>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-tag/create']); ?>">Добавить</a>
</p>

<hr>

<?= yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $modelTag,
    'columns' => [
        'id',
        'title',
        'alias',
        [
            'format' => 'html',
            'label' => 'Опции',
            'value' => function ($modelTag) {
                /** @var app\models\Tag $modelTag */
                return
                    Html::a('Просмотреть', ['back-tag/view', 'id' => $modelTag->id], ['class' => 'btn btn-default']) . ' ' .
                    Html::a('Изменить', ['back-tag/update', 'id' => $modelTag->id], ['class' => 'btn btn-default']) . ' ' .
                    Html::a('Удалить', ['back-tag/delete', 'id' => $modelTag->id], ['class' => 'btn btn-danger']);
            },
        ]
    ],
]);
?>

