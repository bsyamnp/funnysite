<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Club extends Model
{
    use HasFactory;
    protected $fillable = ['image','name','name_kz','name_en', 'country','country_kz','country_en', 'stadium','stadium_kz','stadium_en','trophies','cost','user_id','club_id','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function usersRated(){
            return $this->belongsToMany(User::class)->withPivot('rating')->withTimestamps();
    }
//    public function shop(){
//        return $this->belongsTo(Shop::class);
//    }
    public function shops(){
        return $this->hasmany(Shop::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
