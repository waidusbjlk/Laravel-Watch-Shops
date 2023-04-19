<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model{
    use HasFactory;



    protected $fillable = ['title','content', 'price','category_id', 'user_id','img'];

    //Watch myna Category ga jatady
    public function category(){
        return $this->belongsTo(Category:: class);
    }

    public  function user(){
        return $this->belongsTo(User::class);
    }

    public function UsersRated(){
        return $this->belongsToMany(User::class,'watch_user')->withPivot('rating')->
        withTimestamps();
    }

    public function usersCart(){
        return $this->belongsToMany(User::class,'cart')->
        withTimestamps()->withPivot('quantity','city','status');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }




//    public function UsersSize(){
//        return $this->belongsToMany(User::class,'watch_size')->withPivot('size')
//            ->withTimestamps();
//    }





}
