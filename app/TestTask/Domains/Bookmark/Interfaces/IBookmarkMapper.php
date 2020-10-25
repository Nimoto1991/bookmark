<?php


namespace App\TestTask\Domain\Bookmark\Interfaces;

use App\Domains\Bookmark\Interfaces\IBookmarkDBEntity;
use App\TestTask\Domain\Bookmark\Bookmark;

/**
 * Интерфейс маппера для преобразования сущностей из БД в сущности бизнес логики и наборот
 */
interface IBookmarkMapper {

    /**
     * Создание объекта бизнес логики по ID
     *
     * @param int|null $id ID закладки
     *
     * @return Bookmark
     */
    public function makeDomainEntityById(?int $id): Bookmark;


    /**
     * Создание объекта бизнес логики из объекта БД
     *
     * @param IBookmarkDBEntity $bookmarkDBEntity Объект БД
     *
     * @return Bookmark
     */
    public function makeDomainEntity(IBookmarkDBEntity $bookmarkDBEntity): Bookmark;


    /**
     * Создание объекта из БД
     *
     * @param Bookmark $bookmark Объект закладки из бизнес логики
     */
    public function makeDBEntity(Bookmark $bookmark);

    /**
     * Получить соответствующее поле из БД
     *
     * @param string $field Поле сущности бизнес логики
     *
     * @return string
     */
    public function getDBField(string $field): string;

    /**
     * Получить название таблицы
     *
     * @return string
     */
    public function getTableName(): string;
}
