<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function owner(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }
}
