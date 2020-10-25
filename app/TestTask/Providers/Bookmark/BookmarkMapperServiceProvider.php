<?php


namespace App\TestTask\Providers\Bookmark;


use App\TestTask\Domain\Bookmark\Implementations\AR\BookmarkMapperAR;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkMapper;
use Illuminate\Support\ServiceProvider;

class BookmarkMapperServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(IBookmarkMapper::class, function (): IBookmarkMapper {
            return new BookmarkMapperAR();
        });
    }

}
