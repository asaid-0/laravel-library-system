<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
       use SoftDeletes;

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    //
    public static function boot() {
        parent::boot();

        static::deleting(function($category) { // before delete() method call this
            $category->books()->delete();
        });
    }
}
