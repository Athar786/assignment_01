<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class uploadvideo extends Model
{
	//use SoftDeletes;

    protected $table = 'uploadvideo';
    protected $fillable = ['v_title','v_category','v_description','video','image','user_id'];
    

    public function comments()
    {
    	return $this->hasMany(comments::class)->whereNull('parent_id');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }
    
    public function likes(){
      return $this->belongsTo('App\like');
    }
}
