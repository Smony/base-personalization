<?php

namespace Smony\Personalization\Models;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    protected $table = 'user_history';
    public $fillable = ['user_cookies_id', 'interest_id', 'value'];
    public $timestamps = true;
}
