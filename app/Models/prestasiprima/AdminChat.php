<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminChat extends Model
{
    use HasFactory;

    protected $table = 'admin_chats';

    protected $fillable = [
        'user_id',
        'user_name',
        'message',
        'type',
    ];
}
