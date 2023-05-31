<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File_type extends Model
{
    protected $table="file_types";
    protected $guarded=["id"];
    use HasFactory;
}
