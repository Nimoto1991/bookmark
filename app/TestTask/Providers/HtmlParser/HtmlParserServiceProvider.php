<?php


namespace App\TestTask\Providers\HtmlParser;

use App\Domains\HtmlParser\Implementations\DomCrawler\HtmlParser;
use App\Domains\HtmlParser\Interfaces\IHtmlParser;
use Illuminate\Support\ServiceProvider;

class HtmlParserServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(IHtmlParser::class, function (): IHtmlParser {
            return new HtmlParser();
        });
    }

}
