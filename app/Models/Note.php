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

public static function getNote($user_id)
{  
    $note = self::where('user_id', $user_id);

    if (!empty(request('title'))) {
        $title = request('title');
        $note = $note->where('title', 'LIKE', '%'. $title. '%');
    }

    if (!empty(request('content'))) {
        $content = request('content');
        $note = $note->where('content', 'LIKE', '%'. $content. '%');
    }

    return $note->paginate(3);
}

    
}
