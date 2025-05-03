<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{

    public $incrementing    = false;
    protected $primaryKey   = 'id';
    protected $table        = 'markets';

    protected $fillable = ['name', 'owner_id'];

    protected static function booted()
    {
        static::creating(fn(Market $market) => $market->id = (string) Uuid::uuid4());
    }
}
