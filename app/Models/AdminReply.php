<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminReply extends Model
{
    use HasFactory;

    protected $table = 'admin_replies';
    protected $fillable = [
        'replyId',
        'userEmail',
        'msg',
    ];
}
