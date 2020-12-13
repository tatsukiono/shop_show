<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable = 
    [
        'name',
        'location',
        'price',
        'body',
        'image_url'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function likes()
    {
      return $this->hasMany('App\Model\Like');
    }

}
