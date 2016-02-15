<?php

namespace app\controllers;

use Yii;
use app\models\Book;
use app\models\Author;
use app\models\Tag;

class BackBookController extends MainController
{

    /**
     * Главная страница админки.
     *
     * @return string
     */
    public function actionIndex()
    {
        $modelBook = new Book();
        $dataProvider = $modelBook->search(Yii::$app->request->get());

        return $this->render('/back/book/index', [
            'modelBook' => $modelBook,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Страница добавления книги.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $modelBook = new Book();

        $this->_saveBook($modelBook);

        return $this->render('/back/book/create', [
            'modelBook' => $modelBook,
        ]);
    }

    /**
     * Страница изменения информации книги.
     *
     * @param int $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id)
    {
        /** @var Book $modelBook */
        $modelBook = Book::find()->with(['authors', 'tags'])->where(['id' => $id])->one();

        $this->_saveBook($modelBook);

        return $this->render('/back/book/update', [
            'modelBook' => $modelBook,
        ]);
    }

    /**
     * Сохраняет модель и связанные данные
     *
     * @param Book $modelBook
     * @return \yii\web\Response
     */
    private function _saveBook(Book $modelBook) {
        $authorIds = Yii::$app->request->post('authors');
        $tagIds = Yii::$app->request->post('tags');

        if ($modelBook->load(Yii::$app->request->post()) && $modelBook->save()) {
            array_map(function($model) use ($modelBook) {$modelBook->unlink('authors', $model, true);}, $modelBook->authors);
            foreach ($authorIds?:[] as $authorId) {
                /** @var Author $modelAuthor */
                $modelAuthor = Author::findOne($authorId);
                $modelBook->link('authors', $modelAuthor);
            }
            array_map(function($model) use ($modelBook) {$modelBook->unlink('tags', $model, true);}, $modelBook->tags);
            foreach ($tagIds?:[] as $tagId) {
                /** @var Tag $modelTag */
                $modelTag = Tag::findOne($tagId);
                $modelBook->link('tags', $modelTag);
            }
            return $this->redirect(['back-book/view', 'id' => $modelBook->id]);
        }
    }

    /**
     * Страница просмотра отдельной книги.
     *
     * @param int $id
     * @return string
     */
    public function actionView($id)
    {
        /** @var Book $modelBook */
        $modelBook = Book::findOne($id);

        return $this->render('/back/book/view', [
            'modelBook' => $modelBook,
        ]);
    }

    /**
     * Удаление книги.
     *
     * @param int $id
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        /** @var Book $modelBook */
        $modelBook = Book::findOne($id);

        if ($modelBook->delete()) {
            return $this->redirect(['back-book/index']);
        }
        return $this->refresh();
    }

}
