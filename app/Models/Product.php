<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $fillable = [
        'code',
        'name',
        'price',
    ];
}
