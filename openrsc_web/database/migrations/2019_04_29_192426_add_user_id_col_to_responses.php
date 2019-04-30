<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdColToResponses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
		Schema::table('news_responses', function (Blueprint $table) {
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
			$table->dropForeign('news_responses_user_id_foreign');
			$table->dropColumn('user_id');
		});
	}
}
