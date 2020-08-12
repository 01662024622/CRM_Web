<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
	protected $fillable = [
        'name', 'code', 'description'
    ];
    protected $table = "apartments";
}
