<?php

namespace App\Http\Controllers;

use App\Models\Ijin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IjinController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // echo "Hi ";
    }

    public function getAll() {
        $data = Ijin::all();

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getByKodeDivisi($kodedivisi) {
        $data = Ijin::where('kodedivisi', '=', $kodedivisi)->orderBy('id')->get();

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getByNup($nup) {
        $data = Ijin::where('nup', '=', $nup)->orderBy('id')->get();

        if ($data[0]['ijin'] == '1') {
            $data[0]['ijin'] = 'Sakit';
        } elseif ($data[0]['ijin'] == '2') {
            $data[0]['ijin'] = 'Keperluan';
        } else {
            $data[0]['ijin'] = 'Datang Telat';
        }

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }
}
