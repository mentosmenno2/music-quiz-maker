<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessTokensTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('access_tokens', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id');
			$table->string('access_token');
			$table->dateTime('expire_date');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('access_tokens', function (Blueprint $table) {
			$table->dropForeign(['user_id']);
		});

		Schema::dropIfExists('users');
	}
}
