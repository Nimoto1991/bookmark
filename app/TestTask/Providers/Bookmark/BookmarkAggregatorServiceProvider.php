<?php


namespace App\TestTask\Providers\Bookmark;

use App\TestTask\Domain\Bookmark\Implementations\AR\BookmarkAggregatorAR;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkAggregator;
use App\TestTask\Domain\Bookmark\Interfaces\IBookmarkMapper;
use Illuminate\Support\ServiceProvider;

class BookmarkAggregatorServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(IBookmarkAggregator::class, function (): IBookmarkAggregator {
            $mapper = $this->app->make(IBookmarkMapper::class);
            return new BookmarkAggregatorAR($mapper);
        });
    }
}
