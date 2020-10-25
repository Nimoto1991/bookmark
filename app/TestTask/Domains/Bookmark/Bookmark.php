<?php


namespace App\TestTask\Domain\Bookmark;

/**
 * Модель, описывающая сущность "закладка"
 */
class Bookmark {

    /** @var int|null ID закладки */
    private $id;

    /** @var string URL закладки */
    private $url;

    /** @var string Фавикон */
    private $favicon;

    /** @var string Заголовок страницы */
    private $title;

    /** @var string Описание страницы */
    private $description;

    /** @var string Ключевые слова */
    private $keywords;

    /** @var int Дата создания записи*/
    private $dateCreate;

    /**
     * Bookmark constructor.
     * @param int|null $id ID закладки
     */
    public function __construct(?int $id = null) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getFavicon() {
        return $this->favicon;
    }

    /**
     * @param mixed $favicon
     */
    public function setFavicon($favicon): void {
        $this->favicon = $favicon;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getKeywords() {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords): void {
        $this->keywords = $keywords;
    }

    /**
     * @return mixed
     */
    public function getDateCreate(): string {
        return $this->dateCreate;
    }

    /**
     * @param mixed $dateCreate
     */
    public function setDateCreate($dateCreate): void {
        $this->dateCreate = $dateCreate;
    }
}
