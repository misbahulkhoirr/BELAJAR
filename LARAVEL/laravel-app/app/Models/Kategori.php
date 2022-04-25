<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Kategori extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function blog()
    {
        return $this->hasMany(Blog::class); // join ke table Blog,  1 kategori banyak blog
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
