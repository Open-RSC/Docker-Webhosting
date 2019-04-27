<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($news_post_id)
 * @method news_post_response
 * @property mixed id
 */
class news_post extends Model
{
	public function news_post_responses()
	{
		return $this->hasMany('App\news_post_response');
	}
}
