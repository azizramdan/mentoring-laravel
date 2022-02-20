<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'category_id', 'image', 'stock'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function scopeAvailable($query, $stock = 0)
    {
        $query->where('stock', '>', $stock);
    }
}
