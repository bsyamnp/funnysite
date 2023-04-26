<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'balance'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function clubs(){
        return $this->hasMany(Club::class);
    }
    public function shop(){
        return $this->hasMany(Shop::class);
    }
    public function shopsRated(){
        return $this->belongsToMany(Shop::class,'tovar_user')->withPivot('rating')
            ->withTimestamps()->using(Tovar_user::class);

    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
        public function fotballist(){
            return $this->belongsTo(Fotballist::class);
        }
//    public function shopKorzina(){
//        return $this->belongsToMany(Shop::class,'shop_user')->withTimestamps();
//    }

    public function shopsBought(){
        return $this->belongsToMany(Cart::class,'shop_user')->withTimestamps()
            ->withPivot('number','color','size','status')
            ->using(Cart::class);
    }
    public function shopsWithStatus($status){
        return $this->belongsToMany(Shop::class,'shop_user')
            ->wherePivot('status',$status)->withTimestamps()
            ->withPivot('number','color','size','status')
            ->using(Cart::class);
    }

}
