<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportMarket extends Model
{
    
    protected $fillable = [
        'customer_id', 'advisory', 'feedback', 'feedback_other', 'dev_plan', 'type', 'scale', 'service', 'type_market','user_id','date_work'
    ];
    protected $table = "report_markets";
}
