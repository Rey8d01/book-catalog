<?php

namespace app\models;

/**
 * Class BookAtAuthor
 *
 * @property int $book_id
 * @property string $author_id
 * @package app\models
 */
class BookAtAuthor extends MainActiveRecord
{

    public function rules()
    {
        return [
            [['book_id', 'author_id'], 'required'],
            [['book_id', 'author_id'], 'safe'],
        ];
    }

}
