<?php

namespace app\controllers;

use Yii;
use app\models\Author;

class BackAuthorController extends MainController
{

    /**
     * Главная страница админки.
     *
     * @return string
     */
    public function actionIndex()
    {
        $modelAuthor = new Author();
        $dataProvider = $modelAuthor->search(Yii::$app->request->get());

        return $this->render('/back/author/index', [
            'modelAuthor' => $modelAuthor,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Страница добавления автора.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $modelAuthor = new Author();

        if ($modelAuthor->load(Yii::$app->request->post()) && $modelAuthor->save()) {
            return $this->redirect(['back-author/view', 'id' => $modelAuthor->id]);
        }

        return $this->render('/back/author/create', [
            'modelAuthor' => $modelAuthor,
        ]);
    }

    /**
     * Страница изменения информации автора.
     *
     * @param int $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id)
    {
        /** @var Author $modelAuthor */
        $modelAuthor = Author::findOne($id);

        if ($modelAuthor->load(Yii::$app->request->post()) && $modelAuthor->save()) {
            return $this->redirect(['back-author/view', 'id' => $modelAuthor->id]);
        }

        return $this->render('/back/author/update', [
            'modelAuthor' => $modelAuthor,
        ]);
    }

    /**
     * Страница просмотра отдельного автора.
     *
     * @param int $id
     * @return string
     */
    public function actionView($id)
    {
        /** @var Author $modelAuthor */
        $modelAuthor = Author::findOne($id);

        return $this->render('/back/author/view', [
            'modelAuthor' => $modelAuthor,
        ]);
    }

    /**
     * Удаление автора.
     *
     * @param int $id
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        /** @var Author $modelAuthor */
        $modelAuthor = Author::findOne($id);

        if ($modelAuthor->delete()) {
            return $this->redirect(['back-author/index']);
        }
        return $this->refresh();
    }

}
