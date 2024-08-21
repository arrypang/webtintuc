<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $primaryKey = 'commentID';
    protected $fillable = [
        'content',
        'userID',
        'articleID',
    ];

    public function user(){
        return $this->belongsTo(User::class,'userID');
    }

}
