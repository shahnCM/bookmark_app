<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $table = 'categories';
    protected $guarded = [];

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
