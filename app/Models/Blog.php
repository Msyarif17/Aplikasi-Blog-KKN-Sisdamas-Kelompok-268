<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TagDetail;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'category_id',
        'content',
        'image'
    ];
    protected $table = 'blog';
    public function tag(){
        return $this->belongsToMany(Tag::class,'tag_details','blog_id','tag_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
