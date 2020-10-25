<?php


namespace App\TestTask\Domain\Bookmark\Implementations\AR;

use App\TestTask\Domain\Bookmark\Bookmark;
use App\TestTask\Domain\Bookmark\Implementations\AR\Model\Bookmark as BookmarkAR;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkHandler;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkMapper;

/**
 * Класс обработчика закладок, сохранения и удаления
 */
class BookmarkHandlerAR implements IBookmarkHandler {

    /** @var IBookmarkMapper $mapper Маппер для преобразования сущности бизнес логики в active record и наоборот */
    private $mapper;

    /**
     * BookmarkHandlerAR constructor.
     * @param IBookmarkMapper $mapper Маппер для преобразования сущности бизнес логики в active record и наоборот
     */
    public function __construct(IBookmarkMapper $mapper) {
        $this->mapper = $mapper;
    }

    /**
     * @inheritDoc
     */
    public function save(Bookmark $bookmark): int {
        $bookmarkDbEntity = $this->getBookmarkDbEntity($bookmark);
        $bookmarkDbEntity->save();

        return $bookmarkDbEntity->id;
    }

    /**
     * @inheritDoc
     */
    private function getBookmarkDbEntity(Bookmark $bookmark): BookmarkAR {
        return $this->mapper->makeDBEntity($bookmark);
    }

    /**
     * @inheritDoc
     */
    public function delete(Bookmark $bookmark): void {
        $bookmarkDbEntity = $this->getBookmarkDbEntity($bookmark);
        $bookmarkDbEntity->delete();
    }
}
