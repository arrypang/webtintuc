<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $primaryKey = 'articleID';
    protected $fillable = [
        'title',
        'content',
        'slug',
        'userID',
        'categoryID',
        'status',
        'image',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class, 'articleID', 'articleID');
    }
}
