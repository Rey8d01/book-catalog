<?php

namespace app\models;

/**
 * Class BookAtTag
 *
 * @property int $book_id
 * @property string $tag_id
 * @package app\models
 */
class BookAtTag extends MainActiveRecord
{

    public function rules()
    {
        return [
            [['book_id', 'tag_id'], 'required'],
            [['book_id', 'tag_id'], 'safe'],
        ];
    }

}
