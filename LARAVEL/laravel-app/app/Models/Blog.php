<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory;
    use Sluggable;
    // protected $fillable = ['title', 'excerpt', 'body']; // $fillable untuk menentukan kolom mana yang harus di isi, sisanya gak boleh diisi
    protected $guarded = ['id']; //$guarded untuk menentukan kolom mana yang tidak boleh diisi, sisanya boleh di isi.
    protected $with = ['user', 'kategori'];

    public function scopeFilter($query, array $filter)
    {
        // if (isset($filter['search']) ? $filter['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filter['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filter['search'] . '%'); //mencari berdasarkan judul atau berdasarkan kata yang ada didalam paragraf
        // }

        $query->when($filter['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%'); //when pengganti if = miliknya collection laravel . $filter['search'] ?? false = milik php 7 untuk mengganti isset($filter['search']) ? $filter['search'] : false dan like keyword sql pencarian
        });

        $query->when($filter['kategori'] ?? false, function ($query, $kategori) {
            return $query->whereHas('kategori', function ($query) use ($kategori) {
                $query->where('slug', $kategori);
            }); //versi callback => whereHas = fungsi join table
        });

        $query->when(
            $filter['user'] ?? false,
            fn ($query, $user) =>
            $query->whereHas(
                'user',
                fn ($query) =>
                $query->where('username', $user)
            ) //versi errowfunction  => whereHas = fungsi join table
        );
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class); // join ke table kategori, 1 blog 1 kategori
    }

    public function user()
    {
        return $this->belongsTo(User::class); // join ke table user, 1 blog 1 user
    }

    //untuk ngakalin Route::resource yang default detail berdasarkan id, di ubah menjadi slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
