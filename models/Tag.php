<?php

namespace app\models;

/**
 * Class Tag
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @package app\models
 */
class Tag extends MainActiveRecord
{

    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['alias'], 'unique'],
            [['alias'], \yii\validators\RegularExpressionValidator::class, 'pattern' => '/^[\w-]+$/'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['id', 'title', 'alias'], 'safe'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'title' => 'Название метки',
            'alias' => 'Псевдоним метки',
        ];
    }
}
