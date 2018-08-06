<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'position'];
    protected $hidden = ['password', 'remember_token'];
    
    public function course()
    {
        return $this->hasMany(Course::class, 'author_id');
    }
}
