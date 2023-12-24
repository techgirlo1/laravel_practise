<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{

    public function products(){
        return $this->hasMany(Product::class);
    }
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_category',
        
    ];
}
