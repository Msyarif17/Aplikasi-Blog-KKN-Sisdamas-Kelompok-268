<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;
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
