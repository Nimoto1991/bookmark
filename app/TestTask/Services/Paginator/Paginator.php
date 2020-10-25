<?php


namespace App\TestTask\Services\Paginator;

/**
 * Описание пагинации
 */
class Paginator {

    /** @var int Текущая страница */
    private $currentPage;

    /** @var array Массив ссылок */
    private $links = [];

    /** @var array Массив элементов, выводящихся на страницу */
    private $items = [];

    /**
     * Получить массив элементов, выводящихся на страницу
     *
     * @return array
     */
    public function getItems() : array {
        return $this->items;
    }


    /**
     * Задать массив элементов, выводящихся на страницу
     */
    public function setItems($items): void {
        $this->items = $items;
    }

    /**
     * Получить текущую страницу
     *
     * @return int
     */
    public function getCurrentPage() : int {
        return $this->currentPage;
    }

    /**
     * Задать текущую страницу
     */
    public function setCurrentPage($currentPage): void {
        $this->currentPage = $currentPage;
    }


    /**
     * Получить массив ссылок
     *
     * @return array
     */
    public function getLinks() : array {
        return $this->links;
    }

    /**
     * Сохранить ссылку в массив
     *
     * @param string $url Url
     * @param string $label Лэйбл
     */
    public function addLink(string $url, string $label): void {
        $this->links[] = new PageLink($url, $label);
    }
}
