<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'slug'];
    protected $table = 'tags';
    
    public function blog(){
        return $this->belongsToMany(Blog::class,'tag_details','tag_id','blog_id');
    }
}
