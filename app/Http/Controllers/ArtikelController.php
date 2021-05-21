<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // echo "Hi ";
    }

    public function getAll() {
        $data = Artikel::all();

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getById($id) {
        // $data = Artikel::where('id', '=', $id)->first();
        $data = Artikel::find($id);

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getByJudul($judul) {
        $data = Artikel::where('judul', 'ILIKE', '%' . $judul . '%')->get();

        return response()->json($data);
    }

    public function create(Request $data) {

        // Another process 
        // $artikel = new Artikel();

        // $artikel->judul  = $data->judul;
        // $artikel->gambar = $data->gambar;
        // $artikel->isi    = $data->isi;

        // $artikel->save();

        // Eloquent process
        $artikel = Artikel::create($data->all());

        return response()->json(['data' => $artikel, 'message' => 'Data berhasil dibuat!'], 200);
    }

    public function update(Request $request, $id) {
        $data = Artikel::find($id);
        $data->update($request->all());

        return response()->json(['data' => $data, 'message' => 'Data berhasil diubah!'], 200);
    }

    public function delete($id) {
        $data = Artikel::find($id);
        $data->delete();

        return response()->json(['data' => $data, 'message' => 'Data berhasil dihapus!'], 200);
    }
}
