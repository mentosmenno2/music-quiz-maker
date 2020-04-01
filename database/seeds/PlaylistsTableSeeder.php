<?php

use Illuminate\Database\Seeder;
use App\Models\Playlist;

class PlaylistsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$playlist = new Playlist();
		$playlist->user_id = 1;
		$playlist->name = 'Some playlist';
		$playlist->save();

		$playlist = new Playlist();
		$playlist->user_id = 2;
		$playlist->name = 'Another playlist';
		$playlist->save();
	}
}
