<?php


namespace App\TestTask\Domain\Bookmark\Interfaces;

use App\TestTask\Domain\Bookmark\Bookmark;

/**
 * Интерфейс для класса обработчика закладок, сохранения и удаления
 */
interface IBookmarkHandler {

    /**
     * Сохранение закладки
     *
     * @param Bookmark $bookmark Закладка
     *
     * @return int ID закладки
     */
    public function save(Bookmark $bookmark): int;

    /**
     * Удаление закладки
     *
     * @param Bookmark $bookmark Закладка
     */
    public function delete(Bookmark $bookmark): void;
}
