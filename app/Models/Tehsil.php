<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model
{
    protected $table = "tehsils";
    protected $primaryKey = 'tehsil_id';
    use HasFactory;
}
