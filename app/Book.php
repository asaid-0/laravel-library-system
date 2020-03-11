<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    
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
