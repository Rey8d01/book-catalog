<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

/**
 * Class MainActiveRecord
 *
 * @package app\models
 */
abstract class MainActiveRecord extends ActiveRecord
{

    /**
     * Общий метод для создания дата провайдера по получаемым данным из фильтров.
     *
     * @param array $attributes
     * @return ActiveDataProvider
     */
    public function search(array $attributes = [])
    {
        // Вариант получения данных из приходящего массива - на случай если они пришли через данные формы
        $shortNameClass = (new \ReflectionClass($this))->getShortName();
        if (array_key_exists($shortNameClass, $attributes)) {
            $attributes = $attributes[$shortNameClass];
        }

        $query = $this::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);


        $safeAttributes = $this->safeAttributes();
        if ($safeAttributes) {
            foreach ($safeAttributes as $key => $field) {
                if (array_key_exists($field, $attributes)) {
                    $val = $attributes[$field];
                    if (!(empty($val) && $val !== '0')) {
                        $this->$field = $val;
                        $query->andFilterWhere([$field => $val]);
                    }
                }
            }
        }

        return $dataProvider;
    }

    /**
     * Метод вернет массив id по связанным моделям
     *
     * @param $relAttribute
     * @return array
     */
    public function getRelIds($relAttribute) {
        return array_map(function($relModel) {
            return $relModel->id;
        }, $this->$relAttribute);
    }
}
