<?php
/**
 * @var yii\web\View $this
 * @var app\models\Book $modelBook
 */

$this->title = 'CRUD Books';
?>

<h1>Просмотр информации по книге</h1>

<p>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-book/index']); ?>">Управление</a>
    <a class="btn btn-primary" href="<?= yii\helpers\Url::to(['back-book/create']); ?>">Добавить</a>
    <a class="btn btn-primary"
       href="<?= yii\helpers\Url::to(['back-book/update', 'id' => $modelBook->id]); ?>">Изменить</a>
</p>

<?= yii\widgets\DetailView::widget([
    'model' => $modelBook,
    'attributes' => [
        'id',
        'title',
        'alias',
        'description',
        'photo',
    ],
]);
?>

<div class="row">
    <div class="col-md-6">
        <h4>Авторы книги</h4>
        <?
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $modelBook->getAuthors(),
        ]);

        echo yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                'name',
            ]
        ]);
        ?>
    </div>
    <div class="col-md-6">
        <h4>Метки для книги</h4>
        <?
        $dataProvider = new yii\data\ActiveDataProvider([
            'query' => $modelBook->getTags(),
        ]);

        echo yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                'title',
            ]
        ]);
        ?>
    </div>
</div>
