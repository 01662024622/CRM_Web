<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportMarket extends Model
{
    
    protected $fillable = [
        'customer_id', 'advisory', 'feedback', 'dev_plan', 'type', 'scale', 'service', 'type_market'
    ];
    protected $table = "report_markets";
}
