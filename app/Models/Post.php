<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public function category(){
        $this->belongsTo('App\Models\Categories', 'category_id');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }
    
    protected $fillable = ['title', 'author', 'image', 'description', 'longtext', 'category_id' ];
}
