<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public $directory = "/images/";

    use SoftDeletes;
    //
    //protected  $table = 'posts';
    //protected $primaryKey = 'post_id';

    protected $dates = ['deleted_at'];
    protected $fillable =[
        'title',
        'content',
        'path'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photos(){
        return $this->morphMany('App\Photo','imageable');
    }

    public static function scopeLatest(){

        return $query = orderBy('id','asc')->get();
    }

    public function tags(){
        return $this->morphToMany('App\Tag','taggable');
    }

    public function getPathAttribute($value){//manipulate this data
        return $this->directory . $value;
    }


}
