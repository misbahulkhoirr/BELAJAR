<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kategori;
use App\Http\Resources\KategoriResource;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::get();
        return response()->json(
            KategoriResource::collection($kategori)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255',
            'slug_kategori' => 'required|string|max:20'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug_kategori' => $request->slug_kategori,

        ]);

        return response()->json([
            'Kategori created successfully.', new KategoriResource($kategori)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);
        if (is_null($kategori)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new KategoriResource($kategori)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255',
            'slug_kategori' => 'required|string|max:20',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug_kategori = $request->slug_kategori;
        $kategori->save();

        return response()->json(['Kategori updated successfully.', new KategoriResource($kategori)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return response()->json('Kategori deleted successfully');
    }
}
