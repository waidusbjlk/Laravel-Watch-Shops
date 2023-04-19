<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'balance',
        'avatar'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function watch(){
        return $this->hasMany(Watch::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
//belongsTo


    public function watchRated(){
        return $this->belongsToMany(Watch::class,'watch_user')->withPivot('rating')->
            withTimestamps();
    }

    public function watchCart(){
        return $this->belongsToMany(Watch::class,'cart')->withPivot('quantity','city','status')->
        withTimestamps();
    }

    public function  watchStatus($status){
        return $this->belongsToMany(Watch::class,'cart')
            ->wherePivot('status',$status)
            ->withTimestamps()
            ->withPivot('quantity','city','status');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

//    public function sizeUser(){
//        return $this->belongsToMany(Watch::class,'watch_size')->withPivot('size')
//            ->withTimestamps();
//    }

}
