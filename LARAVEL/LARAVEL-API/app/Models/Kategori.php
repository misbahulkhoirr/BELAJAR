<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function menu()
    {
        return $this->hasMany(Produk::class); // join ke table Menu,  1 kategori banyak menu
    }
}
