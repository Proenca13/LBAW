<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = Product;

    protected $fillable = ['category_id', 'name', 'image', 'description', 'quantity', 'price', 'discount_percent'];

    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}