<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    use HasFactory;

    public function getAuthIdentifierName()
    {
        return 'user_id'; 
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); 
    }

    public function getAuthPassword()
    {
        return $this->password; 
    }

    public function getRememberToken()
    {
        return $this->remember_token; 
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; 
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; 
    }
}