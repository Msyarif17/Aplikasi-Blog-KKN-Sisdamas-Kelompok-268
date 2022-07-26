<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagDetail extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'tag_id',
        'blog_id',
    ];
    public function tag(){
        return $this->belongsTo(Tag::class);
    }
    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
