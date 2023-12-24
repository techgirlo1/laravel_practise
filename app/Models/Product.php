<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    public function use(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_name',
        'product_category',
        
    ];
}
