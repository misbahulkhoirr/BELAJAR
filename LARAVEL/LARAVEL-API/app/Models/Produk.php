<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function imageable()
    {
        return $this->morphTo();
    }

    //untuk ngakalin Route::resource yang default detail berdasarkan id, di ubah menjadi slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class); // join ke table kategori, 1 menu 1 kategori
    }
}
