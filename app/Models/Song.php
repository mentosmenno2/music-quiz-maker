<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
	public function playlist()
	{
		return $this->belongsTo(Playlist::class);
	}
}
