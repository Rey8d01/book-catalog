<?php
/**
 * @var yii\web\View $this
 * @var app\models\Book $modelBook
 * @var yii\data\ActiveDataProvider $dataProvider
 *
 * Панель управления книгами.
 */

use yii\helpers\Html;

$this->title = 'CRUD Book';
?>

<h1>Управление книгами</h1>

<p>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-book/create']); ?>">Добавить</a>
</p>

<hr>

<?= yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $modelBook,
    'columns' => [
        'id',
        'title',
        'alias',
        [
            'attribute' => 'description',
            'value' => function ($modelBook) {
                /** @var app\models\Book $modelBook */
                return \yii\helpers\BaseStringHelper::truncateWords($modelBook->description, 10);
            },
        ],
        [
            'attribute' => 'photo',
            'format' => 'html',
            'value' => function ($modelBook) {
                /** @var app\models\Book $modelBook */
                return $modelBook->photo ? Html::img($modelBook->photo) : '';
            },
        ],
        [
            'format' => 'html',
            'label' => 'Опции',
            'value' => function ($modelBook) {
                /** @var app\models\Book $modelBook */
                return
                    Html::a('Просмотреть', ['back-book/view', 'id' => $modelBook->id], ['class' => 'btn btn-default']) . ' ' .
                    Html::a('Изменить', ['back-book/update', 'id' => $modelBook->id], ['class' => 'btn btn-default']) . ' ' .
                    Html::a('Удалить', ['back-book/delete', 'id' => $modelBook->id], ['class' => 'btn btn-danger']);
            },
        ]
    ],
]);
?>

