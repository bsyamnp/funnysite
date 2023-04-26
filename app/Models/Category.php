<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected  $fillable=['name','name_en','name_kz','code'];
    public function clubs()
    {
        # Category has a many posts
        return $this->hasMany(Club::class);
    }

}
