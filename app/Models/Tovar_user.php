<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Tovar_user extends Pivot
{
    protected $fillable = ['shop_id','user_id','rating'];
    protected $table ='tovar_user';
    use HasFactory;

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
