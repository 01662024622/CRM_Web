<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
	protected $fillable = [
        'name', 'code', 'description','status','user_id'
    ];
    protected $table = "apartments";

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
