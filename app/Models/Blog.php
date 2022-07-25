<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TagDetail;
class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'category_id',
        'content',
        'image'
    ];
    public function tag(){
        return $this->belongsTo(Tag::class);
    }
}
