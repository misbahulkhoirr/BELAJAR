<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //user
        User::create([
            'name' => 'qbotsista',
            // 'username' => 'qbotsista',
            'email' => 'qbotsista@gmail.com',
            'password' => bcrypt('12345')
        ]);

        //kategori
        Kategori::create([
            'nama_kategori' => 'Henna',
            'slug_kategori' => 'henna'
        ]);

        Kategori::create([
            'nama_kategori' => 'Mahar',
            'slug_kategori' => 'mahar'
        ]);

        Kategori::create([
            'nama_kategori' => 'Parsel',
            'slug_kategori' => 'parsel'
        ]);
        Kategori::create([
            'nama_kategori' => 'Photo Wedding',
            'slug_kategori' => 'photo-wedding'
        ]);

        // Produk::create([
        //     'nama_produk' => 'Henna Putih',
        //     'kategori_id' => '1',
        //     'slug_produk' => 'henna-putih',
        //     'image' => 'image/1.jpg',
        //     'harga' => '200000',
        //     'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero velit delectus laudantium ducimus architecto, repellendus enim voluptates! Iusto, ipsum itaque.',
        // ]);
        // Produk::create([
        //     'nama_produk' => 'Mahar',
        //     'kategori_id' => '2',
        //     'slug_produk' => 'henna-putih',
        //     'image' => 'image/2.png',
        //     'harga' => '200000',
        //     'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero velit delectus laudantium ducimus architecto, repellendus enim voluptates! Iusto, ipsum itaque.',
        // ]);
        // Produk::create([
        //     'nama_produk' => 'Parsel',
        //     'kategori_id' => '3',
        //     'slug_produk' => 'henna-putih',
        //     'image' => 'image/3.jpg',
        //     'harga' => '200000',
        //     'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero velit delectus laudantium ducimus architecto, repellendus enim voluptates! Iusto, ipsum itaque.',
        // ]);
    }
}
