<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $fillable = [
        'user_id',
        'connection_id',
        'message',
        'is_read',
        'is_admin_read',
    ];
}
