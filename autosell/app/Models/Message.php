<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [ 
      'text',
      'chat_id',  
      'user_id',  
    ];
    use HasFactory;
    public function user(){
        $this->belongsTo(User::class);
    }
    public function chat(){
        $this->belongsTo(User::class);
    }
}
