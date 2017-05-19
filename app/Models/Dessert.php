<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dessert extends Model
{
    protected $fillable = [
        'name',
        'price'
    ];
}
