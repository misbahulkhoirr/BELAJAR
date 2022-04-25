<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blog;
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
        User::factory(3)->create(); //ngambil data user random dari factories

        User::create([
            'name' => 'qbotsista',
            'username' => 'qbotsista',
            'email' => 'qbotsista@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Kategori::create([
            'name' => 'Programing',
            'slug' => 'programing'
        ]);

        Kategori::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Kategori::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Blog::factory(25)->create(); //ngambil data blog random dari factories

        // Blog::create([
        //     'title' => 'Judul Pertama',
        //     'user_id' => 1,
        //     'kategori_id' => 1,
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, blanditiis. Cum architecto consectetur, earum unde possimus incidunt voluptates.',
        //     'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, blanditiis. Cum architecto consectetur, earum unde possimus incidunt voluptates. Facere fugit cum commodi nihil magnam, rem delectus inventore, blanditiis sunt vero ipsum velit modi sed nostrum illo facilis optio odio aut eligendi, fuga voluptatibus libero illum voluptates. Iusto quae quod recusandae facilis tenetur ullam aliquid doloribus rerum vitae earum, provident labore laudantium molestias consequuntur accusantium commodi amet aspernatur neque repellendus aut? Doloremque molestias neque doloribus totam? Saepe quaerat nulla assumenda ut fuga pariatur, facilis ipsum.</p><p> Corporis facere veritatis vel non saepe nemo, maiores nam dolor ab rerum minima numquam velit earum impedit mollitia beatae, hic animi qui tenetur omnis tempore delectus, minus eius! Suscipit, magnam consequuntur, hic mollitia fugit ut tempora optio eligendi, iusto nulla autem sunt ea dignissimos est. Iste quam labore itaque ullam exercitationem nam commodi quia ad magnam nobis, beatae voluptate illo odit aliquam aperiam cumque nemo soluta totam non, doloremque eaque? Sit optio, necessitatibus velit aperiam, debitis eius dolorum ratione ut aliquid ipsa, vel suscipit nihil sequi quae explicabo. Recusandae quod fuga neque harum eaque eum doloremque vero quia asperiores. Omnis, sapiente architecto natus, laudantium doloribus temporibus aperiam corporis nobis veritatis dolorem modi exercitationem, doloremque magnam quam.</p>'
        // ]);

        // Blog::create([
        //     'title' => 'Judul Kedua',
        //     'user_id' => 1,
        //     'kategori_id' => 2,
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, blanditiis. Cum architecto consectetur, earum unde possimus incidunt voluptates.',
        //     'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, blanditiis. Cum architecto consectetur, earum unde possimus incidunt voluptates. Facere fugit cum commodi nihil magnam, rem delectus inventore, blanditiis sunt vero ipsum velit modi sed nostrum illo facilis optio odio aut eligendi, fuga voluptatibus libero illum voluptates. Iusto quae quod recusandae facilis tenetur ullam aliquid doloribus rerum vitae earum, provident labore laudantium molestias consequuntur accusantium commodi amet aspernatur neque repellendus aut? Doloremque molestias neque doloribus totam? Saepe quaerat nulla assumenda ut fuga pariatur, facilis ipsum.</p><p> Corporis facere veritatis vel non saepe nemo, maiores nam dolor ab rerum minima numquam velit earum impedit mollitia beatae, hic animi qui tenetur omnis tempore delectus, minus eius! Suscipit, magnam consequuntur, hic mollitia fugit ut tempora optio eligendi, iusto nulla autem sunt ea dignissimos est. Iste quam labore itaque ullam exercitationem nam commodi quia ad magnam nobis, beatae voluptate illo odit aliquam aperiam cumque nemo soluta totam non, doloremque eaque? Sit optio, necessitatibus velit aperiam, debitis eius dolorum ratione ut aliquid ipsa, vel suscipit nihil sequi quae explicabo. Recusandae quod fuga neque harum eaque eum doloremque vero quia asperiores. Omnis, sapiente architecto natus, laudantium doloribus temporibus aperiam corporis nobis veritatis dolorem modi exercitationem, doloremque magnam quam.</p>'
        // ]);

        // Blog::create([
        //     'title' => 'Judul Ketiga',
        //     'user_id' => 1,
        //     'kategori_id' => 2,
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, blanditiis. Cum architecto consectetur, earum unde possimus incidunt voluptates.',
        //     'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, blanditiis. Cum architecto consectetur, earum unde possimus incidunt voluptates. Facere fugit cum commodi nihil magnam, rem delectus inventore, blanditiis sunt vero ipsum velit modi sed nostrum illo facilis optio odio aut eligendi, fuga voluptatibus libero illum voluptates. Iusto quae quod recusandae facilis tenetur ullam aliquid doloribus rerum vitae earum, provident labore laudantium molestias consequuntur accusantium commodi amet aspernatur neque repellendus aut? Doloremque molestias neque doloribus totam? Saepe quaerat nulla assumenda ut fuga pariatur, facilis ipsum.</p><p> Corporis facere veritatis vel non saepe nemo, maiores nam dolor ab rerum minima numquam velit earum impedit mollitia beatae, hic animi qui tenetur omnis tempore delectus, minus eius! Suscipit, magnam consequuntur, hic mollitia fugit ut tempora optio eligendi, iusto nulla autem sunt ea dignissimos est. Iste quam labore itaque ullam exercitationem nam commodi quia ad magnam nobis, beatae voluptate illo odit aliquam aperiam cumque nemo soluta totam non, doloremque eaque? Sit optio, necessitatibus velit aperiam, debitis eius dolorum ratione ut aliquid ipsa, vel suscipit nihil sequi quae explicabo. Recusandae quod fuga neque harum eaque eum doloremque vero quia asperiores. Omnis, sapiente architecto natus, laudantium doloribus temporibus aperiam corporis nobis veritatis dolorem modi exercitationem, doloremque magnam quam.</p>'
        // ]);
    }
}
