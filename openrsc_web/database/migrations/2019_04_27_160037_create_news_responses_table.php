<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_post_id')->unsigned();
            $table->text('reply');
            $table->timestamps();
            $table->foreign('news_post_id')->
            references('id')->
            on('news_posts')->
            onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_responses', function (Blueprint $table) {
            $table->dropForeign('news_responses_news_post_id_foreign');
        });

        Schema::dropIfExists('news_responses');
    }
}
