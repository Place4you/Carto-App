<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follow extends Model
{
    use HasFactory;
    protected $table = 'follow'; // Specify the table name

    public function follower(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function userBeingFollowed(){
        return $this->belongsTo(User::class, 'followeduser');
    }
}
