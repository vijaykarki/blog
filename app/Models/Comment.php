<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    public $primaryKey = 'id';

    protected $fillable =[
        'user_id', 'post_id', 'comment_text', 'comment_date'
    ];

    public function commentor(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
