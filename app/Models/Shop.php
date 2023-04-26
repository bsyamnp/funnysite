<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['url','name','price','club_id'];
    use HasFactory;

    public function clubs(){
        return $this->belongsTo(Club::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }

//    public function usersBought(){
//        return $this->belongsToMany(User::class,'shop_user')->withTimestamps()
//            ->withPivot('number','color','size','status')
//            ->using(Cart::class);
//    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function usersRated(){
        return $this->belongsToMany(User::class,'tovar_user')->withPivot('rating')->withTimestamps()->using(Tovar_user::class);
    }
}
