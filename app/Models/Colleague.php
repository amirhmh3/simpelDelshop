<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colleague extends Model
{
    protected $table="colleagues";
    protected $guarded=["id"];
    use HasFactory;
}
