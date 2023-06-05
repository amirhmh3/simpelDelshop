<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    protected $table="customers";
    protected $guarded=["id"];
    use HasFactory;

    public function wallet():HasMany
    {
        return $this->hasMany(Wallet::class,"costumer_id");
    }
}
