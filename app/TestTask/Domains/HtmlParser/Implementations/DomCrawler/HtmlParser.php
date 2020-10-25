<?php


namespace App\Domains\HtmlParser\Implementations\DomCrawler;

use App\Domains\HtmlParser\Interfaces\IHtmlParser;
use mysql_xdevapi\Exception;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Html парсер
 */
class HtmlParser implements IHtmlParser {

    /**
     * @var Crawler Объект парсера html
     */
    private $crawler;

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function init(string $url): void {
        $html = file_get_contents($url);
        if (!$html) {
            throw new \Exception("Не удалось получить html, url: $url");
        }
        $this->crawler = new Crawler(null, $url);
        if (!$this->crawler) {
            throw new \Exception("Ошибка создания объекта парсера, url: $url");
        }
        $this->crawler->addHtmlContent($html, "UTF-8");
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): string {
        $node = $this->crawler->filter("title");
        return $node->count() ? $node->text() : "";
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string {
        $node = $this->crawler->filter("meta[name=\"description\"]")->eq(0);
        return $node->count() ? $node->attr("content") : "";
    }

    /**
     * @inheritDoc
     */
    public function getFavicon(): string {
        $node = $this->crawler->filter("link[rel=\"shortcut icon\"]")->eq(0);
        return $node->count() ? $node->attr("href") : "";
    }

    /**
     * @inheritDoc
     */
    public function getKeywords(): string {
        $node = $this->crawler->filter("meta[name=\"keywords\"]")->eq(0);
        return $node->count() ? $node->attr("content") : "";
    }
}
