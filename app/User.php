<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post(){
        return $this->hasOne('App\Post');//user_id by default // si fuera otro nombre se pondria ('App\Post','the_user_id')
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function order(){
        $user=User::FindOrFail(1);;
        return $user->name;
    }

//    public function orderHundred(){
//        for($i=1;i<=100;i++)
//        {
//
//        }
//    }

    public function roles(){
        return $this->belongsToMany('App\Role')->withPivot('created_at');
    }

//    public function roles1(){
//
//        //to customize tables name and colums follow the format below
// //       return $this->belongsToMany('App\Role','user_roles','user_id','role_id');
//    }

    public function photos(){
        return $this->morphMany('App\Photo','imageable');
    }

    public function getNameAttribute($value){

        //return ucfirst($value);
        return strtoupper($value);

    }

    public function setNameAttribute($value){
        $this->attributes['name']=strtoupper($value);
    }

    public function printed(){
        return "holaa";
    }

}
