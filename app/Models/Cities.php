<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = "cities";
    protected $primaryKey = "city_id";
    protected $fillable = [
        'city_name','fk_province_id'
    ];
    use HasFactory;
}
