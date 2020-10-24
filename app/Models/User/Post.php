<?php

namespace App\Models\User;

use App\Models\User\Category;
use App\Models\User\Tag;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $fillable = [
    	'title','subtitle','body','image',
    	'slug','publish','like','dislike',
    	'user_id'
    ];

    //relation between Posts And Tags
    
    public function tags(){
        return $this->belongsToMany(Tag::class,'Post_tags')
        ->withTimestamps();
    }


    public function categories(){
        return $this->belongsToMany(Category::class,'category_posts')->withTimestamps();;
    }

   
}
