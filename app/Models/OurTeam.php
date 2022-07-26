<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurTeam extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'our_team';
    protected $fillable = [
        'name',
        'image',
        'nim',
        'email',
        'phone',
        'position',
        'bio',  
        'instagram',
        'facebook',
        'whatsapp',
        'youtube',
        'birthday',
    ];
}
