<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // echo "Hi ";
    }

    public function getAll() {
        $data = Faq::all();

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function get() {
        $datas = Faq::orderBy('id')->get();

        $count = count($datas);
        for ($i=0; $i < $count; $i++) { 
            $data[] = array();

            $date = date_create($datas[$i]['created_at']);
            $tgl=date_format($date, 'd-m-Y');
            $jam=date_format($date, 'H:i:s');
            $data[$i]['id'] = $datas[$i]['id'];
            $data[$i]['pertanyaan'] = $datas[$i]['pertanyaan'];
            $data[$i]['jawaban'] = $datas[$i]['jawaban'];
            $data[$i]['tgl'] = $tgl;
            $data[$i]['jam'] = $jam;
        }

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }
}
