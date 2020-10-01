<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackPR extends Model
{
    protected $fillable = [
        'amount','user_id'
    ];
    protected $table = "feedback_pr";
}
