<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages extends Model{
    protected $tablename = "messages";
    protected $fillable = [
        'message_id',
        'message',
        'send',
        'recive',
        'type_message',
        'is_seen',
    ];
    use HasFactory;
}
