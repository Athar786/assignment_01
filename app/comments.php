<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comments extends Model
{
    

    protected $fillable = ['user_id','post_id', 'parent_id', 'body'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
