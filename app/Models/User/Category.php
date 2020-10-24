<?php

namespace App\Models\User;

use App\Models\User\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug'];

    public function posts(){

    	return $this->belongsToMany(Post::class,

    		'category_posts')->withTimestamps()->orderBy('created_at','DESC')->paginate(3);
    }

    public function getRouteKeyName(){

    	return 'slug';
    }
}
