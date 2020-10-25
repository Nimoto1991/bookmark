<?php

namespace App\TestTask\Domain\Bookmark\Implementations\AR\Model;

use App\Domains\Bookmark\Interfaces\IBookmarkDBEntity;
use Illuminate\Database\Eloquent\Model;

/**
 *  Active Record сущности "закладка"
 */
class Bookmark extends Model implements IBookmarkDBEntity {

    /**
     * Название таблицы
     */
    const TABLE_NAME = "bookmark";

    /**
     * @inheritDoc
     */
    public $timestamps = false;

    /**
     * @inheritDoc
     */
    protected $table = self::TABLE_NAME;

    /**
     * @inheritDoc
     */
    protected $primaryKey = "id";

    /**
     * @inheritDoc
     */
    protected $fillable = ["title", "description", "url", "keywords", "favicon", "created_at"];

}
