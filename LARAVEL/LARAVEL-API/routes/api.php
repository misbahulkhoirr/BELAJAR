<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\API\KategoriController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::resource('mahasiswa', MahasiswaController::class);


//API route for register new user
Route::post('/register', [AuthController::class, 'register']);
//API route for login user
Route::post('/login', [AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::resource('produk', ProdukController::class);
    Route::resource('kategori', KategoriController::class);

    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
 
// Route::get('mahasiswa', [MahasiswaController::class, 'index']);
// Route::post('mahasiswa/addmahasiswa',[MahasiswaController::class, 'store']);
// Route::put('mahasiswa/editmahasiswa',[MahasiswaController::class, 'update']);
// Route::delete('mahasiswa/delete/{id}',[MahasiswaController::class, 'destroy']);
// Route::get('mahasiswa/tampil/{id}',[MahasiswaController::class, 'show']);