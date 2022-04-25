<?php

use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardBlogController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('home', [
        "title" => "Home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Qbotsista",
        "email" => "qbotsista@gmail.com",
    ]);
});

Route::get('/blog', [BlogController::class, 'index']);

Route::get('/post/{blog:slug}', [BlogController::class, 'detail']); //variable blog harus sama dengan variable di controller

Route::get('/kategoris', function () {
    return view('kategoris', [
        'title' => "Post Kategori",
        'kategori' => Kategori::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('auth');  // name login untuk mengarahkan ke route login yang ada di middleware
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/blog', DashboardBlogController::class)->middleware('auth');
Route::get('/dashboard/blogs/createSlug', [DashboardBlogController::class, 'createSlug']); //membuatslugotomatis

Route::resource('/dashboard/kategori', AdminController::class)->except('show')->middleware('admin'); //show tidak di pakai
Route::get('/dashboard/kategoris/createSlug', [AdminController::class, 'createSlug']);



// Route::get('/kategoris/{kategori:slug}', function (Kategori $kategori) {
//     return view('blog', [
//         'title' => "Post By Kategori : $kategori->name",
//         'active' => "kategoris",
//         'post' => $kategori->blog->load(['user', 'kategori']),
//     ]);
// });

// Route::get('/user/{user:username}', function (User $user) {
//     return view('blog', [
//         'title' => "Post By Author : $user->name",
//         'active' => "blog",
//         'post' => $user->blog->load(['user', 'kategori']),
//     ]);
// });