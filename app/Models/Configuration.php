<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'favicon',
        'title',
        'keywords',
        'banner',
        'color',
        'instagram_name',
        'instagram',
        'youtube',

    ];
    protected $table = 'configuration';
}
