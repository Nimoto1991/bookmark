<?php


namespace App\Domains\HtmlParser\Interfaces;

/**
 * Парсер html
 */
interface IHtmlParser {

    /**
     * Инициализация парсера
     *
     * @param string $url URL страницы
     *
     * @return void
     */
    public function init(string $url): void;

    /**
     * Получить title
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Получить description
     *
     * @return string
     */
    public function getDescription(): string;

    /**
     * Получить keywords
     *
     * @return string
     */
    public function getKeywords(): string;

    /**
     * Получить favicon
     *
     * @return string
     */
    public function getFavicon(): string;
}
