<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    public static function boot() {
        parent::boot();
        static::deleting(function($user) { // before delete() method call this
            $user->userComments()->detach();
            $user->leasedBooks()->detach();
            $user->favoriteBooks()->detach();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username' ,'isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function favoriteBooks(){

        return $this->belongsToMany('App\Book', 'user-favorite-book', 'user_id', 'book_id');

    }
    public function leasedBooks(){

        return $this->belongsToMany('App\Book', 'book-leasedby-user', 'user_id', 'book_id')->withPivot('NumofDays','created_at');

    }
    public function userComments(){

        return $this->belongsToMany('App\Book', 'user-comment-book', 'user_id', 'book_id')->withPivot('comment','rank','created_at');

    }
 
}
