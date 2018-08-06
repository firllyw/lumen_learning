<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //protected $with = ['author', 'category', 'documents'];
    protected $fillable = ['category_id', 'title', 'author_id','description', 'content', 'file', 'cover','duration', 'updated_at', 'created_at'];

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class,'course_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
