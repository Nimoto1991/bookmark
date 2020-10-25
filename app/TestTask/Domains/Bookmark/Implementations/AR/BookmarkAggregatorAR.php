<?php


namespace App\TestTask\Domain\Bookmark\Implementations\AR;

use App\TestTask\Domain\Bookmark\Bookmark;
use App\TestTask\Domain\Bookmark\Implementations\AR\Model\Bookmark as BookmarkAR;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkAggregator;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkMapper;
use App\TestTask\Services\Paginator\Paginator;
use App\TestTask\Services\Paginator\PagingConfiguration;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Класс для манипуляций с закладками - получение списка закладок, получение закладки по ID
 */
class BookmarkAggregatorAR implements IBookmarkAggregator {

    /** @var IBookmarkMapper $mapper Маппер для преобразования сущности бизнес логики в active record и наоборот */
    private $mapper;

    /**
     * BookmarkAggregatorAR constructor.
     * @param IBookmarkMapper $mapper Маппер для преобразования сущности бизнес логики в active record и наоборот
     */
    public function __construct(IBookmarkMapper $mapper) {
        $this->mapper = $mapper;
    }

    /**
     * @inheritDoc
     */
    public function getPage(PagingConfiguration $pagingConfiguration): Paginator {
        $bookmarksBuilder = BookmarkAR::query();
        $sortField = $pagingConfiguration->getSortField();
        $sortDirection = $pagingConfiguration->getSortDirection();
        if ($sortField && $sortFieldDb = $this->mapper->getDBField($sortField)) {
            $bookmarksBuilder->orderBy($sortFieldDb, $sortDirection);
        }

        $pageNum = $pagingConfiguration->getPageNum();
        $limit = $pagingConfiguration->getPageLimit();

        /** @var LengthAwarePaginator $bookmarksAR */
        $bookmarksAR = $bookmarksBuilder->paginate($limit, ["*"], "page", $pageNum);
        $bookmarks = [];
        foreach ($bookmarksAR as $bookmarkAR) {
            $bookmarks[] = $this->mapper->makeDomainEntity($bookmarkAR);
        }

        $paginator = new Paginator();
        $paginator->setCurrentPage($pageNum);
        $paginator->setItems($bookmarks);

        $pagesCount = ceil($bookmarksAR->total() / $limit);
        if ($pagesCount) {
            $urlRanges = $bookmarksAR->getUrlRange(1, $pagesCount);
            foreach ($urlRanges as $i => $url) {
                $paginator->addLink($url, $i);
            }
        }

        return $paginator;
    }

    /**
     * @inheritDoc
     */
    public function getOne(int $bookmarkId): Bookmark {
        return $this->mapper->makeDomainEntityById($bookmarkId);
    }
}
