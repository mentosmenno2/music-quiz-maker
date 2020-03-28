<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('songs', function (Blueprint $table) {
			$table->id();
			$table->foreignId('game_id');
			$table->timestamps();

			$table->foreign('game_id')->references('id')->on('games');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('songs', function (Blueprint $table) {
			$table->dropForeign(['game_id']);
		});

		Schema::dropIfExists('songs');
	}
}
