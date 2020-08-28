<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'content','order', 'note','user_id'
    ];
    protected $table = "feedbacks";
}
