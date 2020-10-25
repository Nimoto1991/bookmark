<?php


namespace App\TestTask\Services\Paginator;

/**
 * Описание элементов пагинации
 */
class PageLink {

    /** @var string Ссылка на страницу пагинации */
    private $url;

    /** @var string Лейбл ссылки */
    private $label;

    /**
     * PageLink constructor.
     *
     * @param string $url Ссылка на страницу пагинации
     * @param string $label Лейбл ссылки
     */
    public function __construct(string $url, string $label) {
        $this->url = $url;
        $this->label = $label;
    }

    /**
     * Получить лейбл ссылки
     *
     * @return string
     */
    public function getLabel() : string {
        return $this->label;
    }

    /**
     * Получить ссылку на страницу пагинации
     *
     * @return string
     */
    public function getUrl() : string {
        return $this->url;
    }

}
