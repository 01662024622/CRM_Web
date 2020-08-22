<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

	protected $fillable = [
		'code', 'name_follow', 'name_main', 'name_business','address','main_group_id','categorize_customer_id','status',
		'classify_customer_id','supplies','supplies_phone_1','supplies_phone_2','supplies_phone_3','accountant_name','accountant_phone','boss_name','boss_phone','user_code','location'
	];
	protected $table = "customers";
}
