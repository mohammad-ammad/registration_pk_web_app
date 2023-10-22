<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subarea extends Model
{
    protected $table = "subareas";
    protected $primaryKey = "subarea_id";
    protected $fillable = [
        'subarea_name','fk_area_id'
    ];
    use HasFactory;
}
