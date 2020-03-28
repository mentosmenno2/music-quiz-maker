<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function songs()
	{
		return $this->hasMany(Song::class);
	}
}
