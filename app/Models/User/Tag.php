<?php

namespace App\Models\User;

use App\Models\User\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{	
    protected $fillable = ['name','slug'];

    //relation between Posts and Tags
    
    public function posts(){

    	return $this->belongsToMany(Post::class,

    		'Post_tags')->withTimestamps()->orderBy('created_at', 'DESC')->paginate(3);
    }

    public function getRouteKeyName(){

    	return 'slug';
    }
}
