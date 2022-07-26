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
        return $this->belongsTo(Tag::class);
    }
}
