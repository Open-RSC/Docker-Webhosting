<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed reply
 */
class news_post_response extends Model
{
	public function news_post()
	{
		return $this->belongsTo('App\news_post');
	}
}
