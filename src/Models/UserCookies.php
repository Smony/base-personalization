<?php

namespace Smony\Personalization\Models;

use Illuminate\Database\Eloquent\Model;

class UserCookies extends Model
{
    protected $table = 'users_cookies';
    public $fillable = ['user_hash'];

}
