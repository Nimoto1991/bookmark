<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmark', function (Blueprint $table) {
            $table->id();
            $table->timestamp("created_at")->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(false);
            $table->string("favicon")->nullable(true);
            $table->string("url")->nullable(false);
            $table->string("title")->nullable(true);
            $table->string("description")->nullable(true);
            $table->string("keywords")->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmark');
    }
}
