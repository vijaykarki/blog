<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public $primaryKey = 'id';

    protected $fillable =[
        'user_id', 'title', 'post_content'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function post_comment(){
        return $this -> hasMany(Comment::class);
    }
    
}

