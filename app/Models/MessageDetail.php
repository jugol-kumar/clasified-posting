<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageDetail extends Model
{
    use HasFactory;
    protected $table = 'message_details';

    protected $guarded = ['id'];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function messages(){
        return $this->hasMany(Message::class, 'message_details_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'from_id');
    }

}
