<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Kategori;
use App\Models\User;


class BlogController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('kategori')) {
            $kategori = Kategori::firstWhere('slug', request('kategori'));
            $title = ' in ' . $kategori->name;
        }

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = ' by ' . $user->name;
        }

        return view('blog', [
            "title" => "All Post Blog" . $title,
            // "post" => Blog::all() //menampilkan semua blog
            // "post" => Blog::latest()->filter(request(['search', 'kategori', 'user']))->get() //menampilkan semua blog namun yang terakhir di input maka yang di tampilkan teratas . variabel filter ngambil dari model untuk menjalankan fungsi search

            "post" => Blog::latest()->filter(request(['search', 'kategori', 'user']))->paginate(7)->withQueryString()
            //nambahin pagiantion withquerystring untuk string yang dipilih
        ]);
    }

    public function detail(Blog $blog) // $blog ngambil di route
    {
        return view('post', [
            "title" => "Single Post",
            "post" => $blog
        ]);
    }
}
