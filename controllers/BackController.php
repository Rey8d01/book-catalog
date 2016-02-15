<?php

namespace app\controllers;

use Yii;

class BackController extends MainController
{

    /**
     * Главная страница админки.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
