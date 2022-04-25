<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Produk;
use App\Http\Resources\ProdukResource;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::get();
        return response()->json(
            ProdukResource::collection($produk)
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
            'nama_produk'          => 'required|max:255',
            'slug_produk' => 'required|string|max:50',
            'kategori_id'   => 'required',
            'image'         => 'image|file|max:2048', //1024kb = 1mb
            'harga'         => 'required|integer',
            'keterangan'    => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/storage/produk-images'), $new_name);
        }


        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'slug_produk' => $request->slug_produk,
            'kategori_id' => $request->kategori_id,
            'image' => $new_name,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,

        ]);

        return response()->json([
            'Produk created successfully.', new ProdukResource($produk)
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
        $produk = Produk::find($id);
        if (is_null($produk)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new ProdukResource($produk)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk'          => 'required|max:255',
            'slug_produk' => 'required|string|max:20',
            'kategori_id'   => 'required',
            'image'         => 'image|file|max:1024', //1024kb = 1mb
            'harga'         => 'required|integer',
            'keterangan'    => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $produk->nama_produk = $request->nama_produk;
        $produk->slug_produk = $request->slug_produk;
        $produk->kategori_id = $request->kategori_id;
        $produk->image = $request->image;
        $produk->harga = $request->harga;
        $produk->keterangan = $request->keterangan;

        $produk->save();

        return response()->json(['Produk updated successfully.', new ProdukResource($produk)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return response()->json('Produk deleted successfully');
    }
}
