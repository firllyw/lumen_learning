<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthLevel extends Model
{
    protected $fillable = ['id', 'title', 'description', 'created_at', 'updated_at'];
    public function course()
    {
        return $this->hasMany(User::class, 'auth_level');
    }
}
