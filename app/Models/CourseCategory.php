<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $fillable = ['title','description'];

    public function course()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}
