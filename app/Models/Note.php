<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    static function getNote($user_id)
    {  
        return self::where('user_id', $user_id)->paginate(2);
    }
    
}
