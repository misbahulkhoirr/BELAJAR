<?php

namespace App\Models;

class Blog
{
    static $blog_post = [
        [
            "title" => "POST PERTAMA",
            "slug" => "post-pertama",
            "author" => "qbotsista",
            "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error enim corrupti, quasi sint molestias quaerat atque cum officiis, dolor facere, rerum impedit rem voluptatum unde at nisi nobis aut odio provident nemo architecto libero asperiores facilis. Eum accusantium odio doloremque odit, error consectetur provident incidunt id unde neque saepe earum quos harum quibusdam vero at placeat similique dolor, fugiat perspiciatis alias officia optio. At eligendi aut placeat nemo qui quo, harum explicabo natus debitis? Sequi maxime ratione tenetur natus recusandae laborum reprehenderit autem distinctio labore quo repudiandae, neque ut incidunt, eos dignissimos perferendis voluptatem magni ipsam sint minus dolorum quis."

        ],
        [
            "title" => "POST KEDUA",
            "slug" => "post-kedua",
            "author" => "elma",
            "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error enim corrupti, quasi sint molestias quaerat atque cum officiis, dolor facere, rerum impedit rem voluptatum unde at nisi nobis aut odio provident nemo architecto libero asperiores facilis. Eum accusantium odio doloremque odit, error consectetur provident incidunt id unde neque saepe earum quos harum quibusdam vero at placeat similique dolor, fugiat perspiciatis alias officia optio. At eligendi aut placeat nemo qui quo, harum explicabo natus debitis? Sequi maxime ratione tenetur natus recusandae laborum reprehenderit autem distinctio labore quo repudiandae, neque ut incidunt, eos dignissimos perferendis voluptatem magni ipsam sint minus dolorum quisasperiores facilis. Eum accusantium odio doloremque odit, error consectetur provident incidunt id unde neque saepe earum quos harum quibusdam vero at placeat similique dolor, fugiat perspiciatis alias officia optio. At eligendi aut placeat nemo qui quo, harum explicabo natus debitis? Sequi maxime ratione tenetur natus recusandae laborum reprehenderit autem distinctio labore quo repudiandae, neque ut incidunt, eos dignissimos perferendis voluptatem magni ipsam sint minus dolorum quis."

        ]
    ];

    public static function all()
    {
        return collect(self::$blog_post); //karna property static pakai self
    }

    public static function find($slug)
    {
        $post = static::all(); //static karna method static
        // $blog = self::$blog_post;
        // $post = [];
        // foreach ($blog as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        return $post->firstWhere('slug', $slug); // firstWhere merupakan method collection untuk menampilkan data berdasarkan id atau apapun
        // }
    }
}
