<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Landing extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'image',
        'title',
        'description',
        'social_facebook',
        'social_twitter',
        'social_youtube',
        'social_instagram',
        'social_linkedin',
        'links' => 'array'
    ];
}
