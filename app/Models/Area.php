<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "areas";
    protected $primaryKey = "area_id";
    protected $fillable = [
        'area_name','fk_city_id'
    ];
    
    use HasFactory;
}
