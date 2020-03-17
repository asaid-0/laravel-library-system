<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    
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
    public function getCategory(){
        return $this->category()->first()->category_name;
    }
    public function isFavorite(){
        if($user = Auth::user())
            return $this->favoriteFor()->where('users.id', $user->id)->exists();
        return false;
    }
}
