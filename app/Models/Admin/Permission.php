<?php

namespace App\Models\Admin;

use App\Models\Admin\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
   protected $fillable = ['name'];



   public function roles(){
   	return $this->belongsToMany(Role::class,'permission_roles')
   	->withTimestamps();
   }
}
