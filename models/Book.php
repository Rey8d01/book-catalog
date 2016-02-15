<?php

namespace app\models;

use yii\db\ActiveQuery;

/**
 * Class Book
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property string $photo
 * @property string $description
 * @property array $authors
 * @property array $tags
 * @package app\models
 */
class Book extends MainActiveRecord
{

    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['alias'], 'unique'],
            [['alias'], \yii\validators\RegularExpressionValidator::class, 'pattern' => '/^[\w-]+$/'],
            [['photo', 'title', 'alias'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 2000],
            [['id', 'photo', 'title', 'alias', 'description'], 'safe'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'title' => 'Название',
            'alias' => 'Псевдоним для uri',
            'photo' => 'Url адрес обложки',
            'description' => 'Описание',
        ];
    }

    /**
     * @return $this
     */
    public function getAuthors()
    {
        return $this->hasMany(\app\models\Author::class, ['id' => 'author_id'])->viaTable('book_at_author', ['book_id' => 'id']);
    }

    /**
     * @return $this
     */
    public function getTags()
    {
        return $this->hasMany(\app\models\Tag::class, ['id' => 'tag_id'])->viaTable('book_at_tag', ['book_id' => 'id']);
    }

    /**
     * Применение фильтров по связанным данным модели.
     * Поскольку модель имеет 2 связи многие ко многим - необходимо иметь возможность осуществлять строгую
     * фильтрацию по обеим связям. На чистом AR это сделать крайне проблематично, в силу этого часть запроса
     * сформирована вручную.
     *
     * @param ActiveQuery $query
     * @param array $tagIds
     * @param array $authorIds
     */
    public static function applyFilterForRelatedData(ActiveQuery $query, array $tagIds = [], array $authorIds = []) {
        if ($tagIds && $authorIds) {
            // Строгая фильтрация по обеим полям
            // Произведение фильтруемого количества меток на количество авторов - даст требуемое значение
            // для фильтрации по обеим критериям
            $cnt = count($tagIds) * count($authorIds);

            $query
                ->addSelect([
                    Book::tableName().'.*',
                    'COUNT(book_at_tag.book_id) AS cntTag',
                    'COUNT(book_at_author.book_id) AS cntAuthor',
                ])
                ->leftJoin('book_at_tag', '`book`.`id` = `book_at_tag`.`book_id`')
                ->leftJoin('book_at_author', '`book`.`id` = `book_at_author`.`book_id` ')
                ->andFilterWhere([
                    'tag_id' => array_values($tagIds),
                    'author_id' => array_values($authorIds),
                ])
                ->groupBy([
                    'book_at_tag.book_id',
                    'book_at_author.book_id',
                ])
                ->having('cntTag = '.$cnt)
                ->andHaving('cntAuthor = '.$cnt);

        } elseif($tagIds || $authorIds) {
            if ($tagIds) {
                // Применение фильтра по наличию всех меток в $tagIds для объекта $query.
                $term = 'tag';
                $list = $tagIds;
            } else {
                // Применение фильтра по наличию всех авторов в $authorIds для объекта $query.
                $term = 'author';
                $list = $authorIds;
            }

            $query
                ->addSelect([Book::tableName().'.*', 'COUNT('.Book::tableName().'.id) AS cnt'])
                ->joinWith($term.'s')
                ->andFilterWhere([$term.'_id' => array_values($list)])
                ->groupBy('book_id')
                ->having('cnt = '.count($list));
        }
    }

}
