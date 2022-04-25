<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.blog.index', [
            //'post'=>Blog::all(); untuk menampilkan semua post
            'posts' => Blog::where('user_id', auth()->user()->id)->get() //untuk menampilkan post berdasarkan user yang post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.create', [
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request); 
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:blogs',
            'kategori_id' => 'required',
            'image' => 'image|file|max:1024', //1024kb = 1mb
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('blogs-images'); //setting penyimpanan .env = FILESYSTEM_DRIVER=public lalu cmd php artisan storage:link . maka dalam folder public akan ada folder storage blog-images . agar gambar bisa di akses public
        }
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Blog::create($validateData);
        return redirect('/dashboard/blog')->with('success', 'Blog berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('dashboard.blog.show', [
            'post' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.blog.edit', [
            'post'  => $blog,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $rules = [
            'title' => 'required|max:255',
            'kategori_id' => 'required',
            'image' => 'image|file|max:1024', //1024kb = 1mb
            'body' => 'required'
        ];

        if ($request->slug != $blog->slug) {
            $rules['slug'] = 'required|unique:blogs';
        }

        $validateData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->imagelama) {
                Storage::delete($request->imagelama);
            }
            $validateData['image'] = $request->file('image')->store('blogs-images'); //setting penyimpanan .env = FILESYSTEM_DRIVER=public lalu cmd php artisan storage:link . maka dalam folder public akan ada folder storage blog-images . agar gambar bisa di akses public
        }

        Blog::where('id', $blog->id)->update($validateData);
        return redirect('/dashboard/blog')->with('success', 'Blog berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::delete($blog->image);
        }
        Blog::destroy($blog->id);
        return redirect('/dashboard/blog')->with('success', 'Blog berhasil di hapus');
    }

    //membuat slug otomatis
    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
