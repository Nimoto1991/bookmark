<?php


namespace App\TestTask\Controllers\Bookmark;

use App\Domains\HtmlParser\Interfaces\IHtmlParser;
use App\TestTask\Domain\Bookmark\Bookmark;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkHandler;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkMapper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Контроллер для добавления новой закладки
 */
class AddController extends BaseController {

    /**
     * Точка входа
     *
     * @param Request $request Запрос
     * @param IHtmlParser $parser Парсер html
     * @param IBookmarkHandler $handler Объект для сохранения закладки
     * @param IBookmarkMapper $mapper Объект для преобразования объекта закладки бизнес-логики в active record
     *
     * @return mixed
     */
    public function index(Request $request, IHtmlParser $parser, IBookmarkHandler $handler, IBookmarkMapper $mapper) {

        $validatedData = $request->validate([
            "url" => "required|url|unique:" . $mapper->getTableName(),
        ]);

        try {
            $parser->init($validatedData["url"]);
        } catch (\Exception $e) {
            return view("new", ["error" => "Невозможно получить данные с url " . $validatedData["url"]]);
        }

        $bookmark = new Bookmark();
        $bookmark->setUrl($validatedData["url"]);
        $bookmark->setFavicon($parser->getFavicon());
        $bookmark->setKeywords($parser->getDescription());
        $bookmark->setDescription($parser->getKeywords());
        $bookmark->setTitle($parser->getTitle());

        $handler->save($bookmark);
        return new RedirectResponse(route("detail", ["bookmarkId" => $bookmark->getId()]));
    }

}
