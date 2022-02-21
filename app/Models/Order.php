<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'qty',
        'total',
        'status',
        'address',
    ];

    const STATUS_MENUNGGU = 'menunggu';
    const STATUS_DIBAYAR = 'dibayar';
    const STATUS_DIPROSES = 'diproses';
    const STATUS_DIKIRIM = 'dikirim';
    const STATUS_SELESAI = 'selesai';
    const STATUS_KADALUARSA = 'kadaluarsa';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
