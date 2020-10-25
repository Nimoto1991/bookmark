<?php


namespace App\TestTask\Controllers\Bookmark;

use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkAggregator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Контроллер для страницы детального просмотра
 */
class DetailController extends BaseController {

    /**
     * Точка входа
     *
     * @param Request $request Запрос
     * @param IBookmarkAggregator $aggregator Объект для получения списка закладок
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|RedirectResponse
     */
    public function index(Request $request, IBookmarkAggregator $aggregator) {
        $bookmarkId = (int)$request->get("bookmarkId");
        if (!$bookmarkId) {
            return new RedirectResponse("/");
        }

        $bookmark = $aggregator->getOne($bookmarkId);

        $parameters = [
            "bookmark" => $bookmark,
        ];

        return view("detail", $parameters);
    }

}
