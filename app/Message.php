<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    public $timestamps = false;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'message', 'site_id'];
}
