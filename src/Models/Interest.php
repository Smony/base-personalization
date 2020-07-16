<?php

namespace Smony\Personalization\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $table = 'interests';
    public $fillable = ['title'];
    public $timestamps = false;

}
