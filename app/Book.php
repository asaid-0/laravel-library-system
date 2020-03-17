<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'category_id', 'auther','title','price','copies'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function favoriteFor(){

        return $this->belongsToMany('App\User', 'user-favorite-book', 'book_id', 'user_id');

    }
    public function leasedBy(){

        return $this->belongsToMany('App\User', 'book-leasedby-user', 'book_id', 'user_id');

    }
    public function BookComments(){

        return $this->belongsToMany('App\User', 'user-comment-book', 'book_id', 'user_id');

    }
}
