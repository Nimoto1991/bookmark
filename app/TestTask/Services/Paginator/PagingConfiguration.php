<?php


namespace App\TestTask\Services\Paginator;

/**
 * Конфигурация пагинации
 */
class PagingConfiguration {

    /**
     * Количество элементов на странице по умолчанию
     */
    const DEFAULT_PAGE_LIMIT = 5;

    /** @var string Поле объекта бизнес логики, по которому осуществляется сортировка */
    private $sortField;

    /** @var string Направление сортировки */
    private $sortDirection;

    /** @var int Количество элементов на странице */
    private $pageLimit;

    /** @var int Номер страницы */
    private $pageNum;

    /**
     * @return mixed
     */
    public function getSortField() : string {
        return $this->sortField;
    }

    /**
     * @param mixed $sortField
     */
    public function setSortField($sortField): void {
        $this->sortField = $sortField;
    }

    /**
     * @return mixed
     */
    public function getSortDirection() : string {
        return $this->sortDirection == "ASC" ? "ASC" : "DESC";
    }

    /**
     * @param mixed $sortDirection
     */
    public function setSortDirection($sortDirection): void {
        $sortDirection = mb_strtoupper($sortDirection);
        $this->sortDirection = $sortDirection == "ASC" ? "ASC" : "DESC";
    }

    /**
     * @return mixed
     */
    public function getPageLimit() : int {
        return $this->pageLimit ?? self::DEFAULT_PAGE_LIMIT;
    }

    /**
     * @param mixed $pageLimit
     */
    public function setPageLimit($pageLimit): void {
        $this->pageLimit = $pageLimit;
    }

    /**
     * @return mixed
     */
    public function getPageNum() : int {
        return $this->pageNum;
    }

    /**
     * @param mixed $pageNum
     */
    public function setPageNum($pageNum): void {
        $this->pageNum = $pageNum;
    }

}
