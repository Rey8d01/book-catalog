<?php

namespace app\controllers;

use Yii;
use app\models\Tag;

class BackTagController extends MainController
{

    /**
     * Главная страница админки.
     *
     * @return string
     */
    public function actionIndex()
    {
        $modelTag = new Tag();
        $dataProvider = $modelTag->search(Yii::$app->request->get());

        return $this->render('/back/tag/index', [
            'modelTag' => $modelTag,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Страница добавления метки.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $modelTag = new Tag();

        if ($modelTag->load(Yii::$app->request->post()) && $modelTag->save()) {
            return $this->redirect(['back-tag/view', 'id' => $modelTag->id]);
        }

        return $this->render('/back/tag/create', [
            'modelTag' => $modelTag,
        ]);
    }

    /**
     * Страница изменения метки.
     *
     * @param int $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id)
    {
        /** @var Tag $modelTag */
        $modelTag = Tag::findOne($id);

        if ($modelTag->load(Yii::$app->request->post()) && $modelTag->save()) {
            return $this->redirect(['back-tag/view', 'id' => $modelTag->id]);
        }

        return $this->render('/back/tag/update', [
            'modelTag' => $modelTag,
        ]);
    }

    /**
     * Страница просмотра метки.
     *
     * @param int $id
     * @return string
     */
    public function actionView($id)
    {
        /** @var Tag $modelTag */
        $modelTag = Tag::findOne($id);

        return $this->render('/back/tag/view', [
            'modelTag' => $modelTag,
        ]);
    }

    /**
     * Удаление метки.
     *
     * @param int $id
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        /** @var Tag $modelTag */
        $modelTag = Tag::findOne($id);

        if ($modelTag->delete()) {
            return $this->redirect(['back-tag/index']);
        }
        return $this->refresh();
    }

}
