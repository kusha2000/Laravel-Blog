<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $fillable = [
        'user_id',
        'triggered_by',
        'type',
        'reference_id',
        'message',
        'is_read'
    ];
}
