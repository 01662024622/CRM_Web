<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review360 extends Model
{
    protected $fillable = [
		'teamwork', 'apartment_id', 'user_id', 'note', 'create_by','option'
	];
	protected $table = "review_360";
}
