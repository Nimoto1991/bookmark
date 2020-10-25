<?php


namespace App\TestTask\Providers\Bookmark;


use App\TestTask\Domain\Bookmark\Implementations\AR\BookmarkHandlerAR;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkHandler;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkMapper;
use Illuminate\Support\ServiceProvider;

class BookmarkHandlerServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(IBookmarkHandler::class, function (): IBookmarkHandler {
            $mapper = $this->app->make(IBookmarkMapper::class);
            return new BookmarkHandlerAR($mapper);
        });
    }

}
