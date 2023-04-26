<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    protected $fillable = ['shop_id','user_id','number','color','size','status'];
    protected $table ='shop_user';
    use HasFactory;

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
