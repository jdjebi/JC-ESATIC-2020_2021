<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Notification extends Authenticatable
{
    use Notifiable;

    protected $table = 'notifications';

    protected $fillable = ['read_at','seen_at'];

}
