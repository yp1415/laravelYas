<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
   protected $fillable = [
        'name',
        'lastname',
        'code',
        'mobile',
    ];
}
