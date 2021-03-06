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
			$table->foreignId('playlist_id');
			$table->string('title');
			$table->string('artist');
			$table->string('source_id');
			$table->string('source_type');
			$table->integer('start_time');
			$table->integer('end_time');
			$table->timestamps();

			$table->foreign('playlist_id')->references('id')->on('playlists');
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
			$table->dropForeign(['playlist_id']);
		});

		Schema::dropIfExists('songs');
	}
}
