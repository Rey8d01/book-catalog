<?php
/**
 * @var yii\web\View $this
 * @var app\models\Author $modelAuthor
 * @var yii\data\ActiveDataProvider $dataProvider
 *
 * Панель управления книгами.
 */

use yii\helpers\Html;

$this->title = 'CRUD Author';
?>

<h1>Управление авторами</h1>

<p>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-author/create']); ?>">Добавить</a>
</p>

<hr>

<?= yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $modelAuthor,
    'columns' => [
        'id',
        'name',
        [
            'attribute' => 'description',
            'value' => function ($modelAuthor) {
                /** @var app\models\Author $modelAuthor */
                return \yii\helpers\BaseStringHelper::truncateWords($modelAuthor->description, 10);
            },
        ],
        [
            'attribute' => 'photo',
            'format' => 'html',
            'value' => function ($modelAuthor) {
                /** @var app\models\Author $modelAuthor */
                return $modelAuthor->photo ? Html::img($modelAuthor->photo) : '';
            },
        ],
        [
            'format' => 'html',
            'label' => 'Опции',
            'value' => function ($modelAuthor) {
                /** @var app\models\Author $modelAuthor */
                return
                    Html::a('Просмотреть', ['back-author/view', 'id' => $modelAuthor->id], ['class' => 'btn btn-default']) . ' ' .
                    Html::a('Изменить', ['back-author/update', 'id' => $modelAuthor->id], ['class' => 'btn btn-default']) . ' ' .
                    Html::a('Удалить', ['back-author/delete', 'id' => $modelAuthor->id], ['class' => 'btn btn-danger']);
            },
        ]
    ],
]);
?>

