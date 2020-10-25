<?php


namespace App\TestTask\Controllers;

use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkAggregator;
use App\TestTask\Services\Paginator\PagingConfiguration;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Контроллер для главной страницы
 */
class IndexController extends BaseController {

    /**
     * Направление сортировки
     */
    const SORT_DIRECTION = "DESC";

    /**
     * Поле, по которому сортируется выборка
     */
    const SORT_FIELD = "dateCreate";

    /**
     * Точка входа
     *
     * @param Request $request Запрос
     * @param IBookmarkAggregator $aggregator Объект для получения списка закладок
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|RedirectResponse
     */
    public function index(Request $request, IBookmarkAggregator $aggregator) {
        $pageNum = (int)$request->get("page");

        $paging = new PagingConfiguration();
        $paging->setPageNum($pageNum);
        $paging->setSortDirection(self::SORT_DIRECTION);
        $paging->setSortField(self::SORT_FIELD);
        $page = $aggregator->getPage($paging);

        $bookmarks = $page->getItems();

        $links = $page->getLinks();

        $parameters = [
            "bookmarks" => $bookmarks,
            "links" => $links,
        ];

        return view("index", $parameters);
    }

}
