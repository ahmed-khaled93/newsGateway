<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catg_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();

            $table->unique(['catg_id', 'locale']);
            $table->foreign('catg_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_translations');
    }
}
