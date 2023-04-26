<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content','shop_id','user_id'];
    protected $table ='tovar_comments';
    use HasFactory;

    public function shop(){
        return $this->belongsTo(Club::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
