<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookmark extends Model
{
    use SoftDeletes;
    
    protected $table = 'bookmarks';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
