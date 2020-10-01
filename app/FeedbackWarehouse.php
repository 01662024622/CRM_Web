<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackWarehouse extends Model
{
    protected $fillable = [
        'user_id','type', 'code_product', 'amount'
    ];
    protected $table = "feedback_warehouse";
}
