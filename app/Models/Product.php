<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id',
        'nama',
        'harga',
        'file_pendukung'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
