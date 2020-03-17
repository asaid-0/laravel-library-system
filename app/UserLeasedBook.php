<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLeasedBook extends Model
{
    protected $table = 'book-leasedby-user';

    protected $fillable = ['user_id','book_id', 'NumofDays'];

    protected $dates = [
        'leased_until'
    ];
}
