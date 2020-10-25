<?php


namespace App\TestTask\Domain\Bookmark\Implementations\AR;

use App\Domains\Bookmark\Interfaces\IBookmarkDBEntity;
use App\TestTask\Domain\Bookmark\Bookmark;
use App\TestTask\Domain\Bookmark\Implementations\AR\Model\Bookmark as BookmarkAR;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkMapper;

class BookmarkMapperAR implements IBookmarkMapper {

    /** @var array Соответствие полей сущности бизнес логики и сущности из БД */
    private $map = [
        "id" => "id",
        "description" => "description",
        "dateCreate" => "created_at",
        "title" => "title",
        "keywords" => "keywords",
        "favicon" => "favicon",
        "url" => "url",
    ];

    /**
     * @inheritDoc
     */
    public function getDBField(string $field): string {
        if (isset($this->map[$field])) {
            return $this->map[$field];
        }
        throw new Exception("Wrong field $field");
    }

    /**
     * @inheritDoc
     */
    public function makeDomainEntityById(?int $id): Bookmark {
        $bookmarkAR = self::getBookmarkAR($id);
        return $this->makeDomainEntity($bookmarkAR);
    }

    /**
     * @inheritDoc
     */
    private function getBookmarkAR(?int $bookmarkId): BookmarkAR {
        if ($bookmarkId) {
            $bookmarkAR = BookmarkAR::query()->find($bookmarkId);
        } else {
            $bookmarkAR = new BookmarkAR();
        }
        return $bookmarkAR;
    }

    /**
     * @inheritDoc
     */
    public function makeDomainEntity(IBookmarkDBEntity $bookmarkAR): Bookmark {
        /** @var BookmarkAR $bookmarkAR */
        $bookmark = new Bookmark($bookmarkAR->id);
        $bookmark->setDescription($bookmarkAR->description);
        $bookmark->setDateCreate($bookmarkAR->created_at);
        $bookmark->setTitle($bookmarkAR->title);
        $bookmark->setKeywords($bookmarkAR->keywords);
        $bookmark->setFavicon($bookmarkAR->favicon);
        $bookmark->setUrl($bookmarkAR->url);

        return $bookmark;
    }

    /**
     * @inheritDoc
     */
    public function makeDBEntity(Bookmark $bookmark): BookmarkAR {
        $bookmarkId = $bookmark->getId();

        $bookmarkAR = $this->getBookmarkAR($bookmarkId);

        $bookmarkAR->title = $bookmark->getTitle();
        $bookmarkAR->description = $bookmark->getDescription();
        $bookmarkAR->keywords = $bookmark->getKeywords();
        $bookmarkAR->favicon = $bookmark->getFavicon();
        $bookmarkAR->url = $bookmark->getUrl();

        return $bookmarkAR;
    }

    /**
     * @inheritDoc
     */
    public function getTableName(): string {
        return BookmarkAR::TABLE_NAME;
    }
}
