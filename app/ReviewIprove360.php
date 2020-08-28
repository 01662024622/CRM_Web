<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewIprove360 extends Model
{
    protected $fillable = [
        'improve_360_id', 'review_360_id'
    ];
    protected $table = "review_improve_360";
}
