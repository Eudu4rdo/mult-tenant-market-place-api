<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use eudu4rdo\laravelauditforge\Traits\Auditable;

class Product extends Model
{
    use Auditable;

    protected $primaryKey = 'code'; // define a nova chave primária
    public $incrementing = false; // como não é auto-incremento
    protected $keyType = 'string'; // define o tipo da chave como string

    protected $fillable = [
        'code',
        'name',
        'price',
    ];
}