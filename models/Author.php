<?php

namespace app\models;

/**
 * Class Author
 *
 * @property int $id
 * @property string $name
 * @property string $photo
 * @property string $description
 * @package app\models
 */
class Author extends MainActiveRecord
{

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['photo', 'name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 2000],
            [['id', 'photo', 'name', 'description'], 'safe'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'name' => 'Имя автора',
            'description' => 'Об авторе',
            'photo' => 'Url адрес фотографии',
        ];
    }
}
