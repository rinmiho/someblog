<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'body',
	    'article_id',
	    'parent_comment_id'
    ];

	/**
	 * A comment is owned by a user.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User'); //a comment table needs to have some kind of 'user_id' column
	}

	/**
	 * A comment is made to an article.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function article()
	{
		return $this->belongsTo('App\Article'); //a comment table needs to have some kind of 'article_id' column
	}
}
