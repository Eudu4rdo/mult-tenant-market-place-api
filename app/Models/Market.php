<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use eudu4rdo\laravelauditforge\Traits\Auditable;

class Market extends Model
{
    use Auditable;

    public $incrementing    = false;
    protected $keyType      = 'string';
    protected $primaryKey   = 'id';
    protected $table        = 'markets';

    protected $fillable = ['name', 'owner_id'];

    protected static function booted()
    {
        static::creating(fn(Market $market) => $market->id = (string) Uuid::uuid4());
    }
}
