<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $table = 'posts';

    protected $fillable = [
        'title','body',
    ];

    public function categories(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag','post_tag','post_id','tag_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
