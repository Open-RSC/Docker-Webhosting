<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($news_post_id)
 * @method news_post_response
 * @method static orderBy(string $string, string $string1)
 * @property mixed id
 * @property mixed description
 * @property mixed title
 */
class news_post extends Model
{
    public function news_responses()
    {
        return $this->hasMany(\App\news_response::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
