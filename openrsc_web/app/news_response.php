<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed reply
 * @method static orderBy(string $string, string $string1)
 */
class news_response extends Model
{
	public function news_post()
	{
		return $this->belongsTo('App\news_post');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
