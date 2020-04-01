<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$songs = [
			// Inspiratie muziekquiz spotify list
			[
				'title' => 'Sax',
				'artist' => 'Fleur East',
				'source_id' => '3JZ4pnNtyxQ',
				'source_type' => 'youtube',
				'start_time' => 0,
				'end_time' => 34,
			],
			[
				'title' => 'Ego',
				'artist' => 'Willy William',
				'source_id' => 'iOxzG3jjFkY',
				'source_type' => 'youtube',
				'start_time' => 0,
				'end_time' => 30,
			],
			[
				'title' => 'Freaks',
				'artist' => 'Timmy Trumpet',
				'source_id' => 'ofmzX1nI7SE',
				'source_type' => 'youtube',
				'start_time' => 0,
				'end_time' => 30,
			],
			[
				'title' => 'Wrapped Up',
				'artist' => 'Olly Murs',
				'source_id' => 'niLMQsD9ZG4',
				'source_type' => 'youtube',
				'start_time' => 10,
				'end_time' => 42,
			],
			[
				'title' => 'All Around The World (La La La)',
				'artist' => 'R3HAB & A Touch Of Class',
				'source_id' => 'LQ7R9zHeDy8',
				'source_type' => 'youtube',
				'start_time' => 0,
				'end_time' => 22,
			],
			[
				'title' => 'Call on Me',
				'artist' => 'Eric Prydz',
				'source_id' => 'QQSYo_pC-QA',
				'source_type' => 'youtube',
				'start_time' => 51,
				'end_time' => 67,
			],
			[
				'title' => 'Better Off Alone',
				'artist' => 'Alice DJ',
				'source_id' => 'Lgs9QUtWc3M',
				'source_type' => 'youtube',
				'start_time' => 14,
				'end_time' => 44,
			],
			[
				'title' => 'Would I Lie To You?',
				'artist' => 'Charles & Eddie',
				'source_id' => 'G_UXvcr22rM',
				'source_type' => 'youtube',
				'start_time' => 43,
				'end_time' => 74,
			],
			[
				'title' => 'Ruby',
				'artist' => 'Kaiser Chiefs',
				'source_id' => 'qObzgUfCl28',
				'source_type' => 'youtube',
				'start_time' => 0,
				'end_time' => 33,
			],
			[
				'title' => 'Played-A-Live (The Bongo Song)',
				'artist' => 'Safari Duo',
				'source_id' => 'IksRDCMYnn8',
				'source_type' => 'youtube',
				'start_time' => 0,
				'end_time' => 31,
			],
		];

		$playlists = [1, 2];

		foreach ($playlists as $playlist_id) {
			foreach ($songs as $song) {
				$song['playlist_id'] = $playlist_id;
				DB::table('songs')->insert($song);
			}
		}
	}
}
