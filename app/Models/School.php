<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = "schools";
    protected $primaryKey = "school_id";
    protected $fillable = [
        'school_name'
    ];
    
    use HasFactory;
}
