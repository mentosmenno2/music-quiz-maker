<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
	public function game()
	{
		return $this->belongsTo(Game::class);
	}
}
