<?php


namespace App\TestTask\Domain\Bookmark\Interfaces;

use App\TestTask\Domain\Bookmark\Bookmark;
use App\TestTask\Services\Paginator\Paginator;
use App\TestTask\Services\Paginator\PagingConfiguration;

/**
 * Интерфейс класса для манипуляций с закладками - получение списка закладок, получение закладки по ID
 */
interface IBookmarkAggregator {

    /**
     * Получение страницы с закладками и пагинацией
     *
     * @param PagingConfiguration $pagingConfiguration Конфигурация пагинации
     *
     * @return Paginator
     */
    public function getPage(PagingConfiguration $pagingConfiguration): Paginator;

    /**
     * Получение закладки по ID
     *
     * @param int $bookmarkId ID закладки
     *
     * @return Bookmark
     */
    public function getOne(int $bookmarkId): Bookmark;

}
