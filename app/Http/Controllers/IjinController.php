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
        $datas = Ijin::where('kodedivisi', '=', $kodedivisi)->orderBy('id')->get();

        $count = count($datas);
        for ($i=0; $i < $count; $i++) { 
            $data[] = array();
            
            if ($datas[$i]['ijin'] == '1') {
                $izin = 'Sakit';
            } elseif ($datas[$i]['ijin'] == '2') {
                $izin = 'Keperluan';
            } else {
                $izin = 'Datang Telat';
            }

            $date = date_create($datas[$i]['created_at']);
            $tgl=date_format($date, 'd-m-Y');
            $jam=date_format($date, 'H:i:s');
            $data[$i]['id'] = $datas[$i]['id'];
            $data[$i]['nup'] = $datas[$i]['nup'];
            $data[$i]['izin'] = $datas[$i]['ijin'];
            $data[$i]['ketizin'] = $izin;
            $data[$i]['keterangan'] = $datas[$i]['keterangan'];
            $data[$i]['approved'] = $datas[$i]['approved'];
            $data[$i]['nup_approved'] = $datas[$i]['nup_approved'];
            $data[$i]['tgl_approved'] = $datas[$i]['tgl_approved'];
            $data[$i]['tgl'] = $tgl;
            $data[$i]['jam'] = $jam;
        }

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getByNup($nup) {
        $datas = Ijin::where('nup', '=', $nup)->orderBy('id')->get();

        $count = count($datas);
        for ($i=0; $i < $count; $i++) { 
            $data[] = array();
            
            if ($datas[$i]['ijin'] == '1') {
                $izin = 'Sakit';
            } elseif ($datas[$i]['ijin'] == '2') {
                $izin = 'Keperluan';
            } else {
                $izin = 'Datang Telat';
            }

            $date = date_create($datas[$i]['created_at']);
            $tgl=date_format($date, 'd-m-Y');
            $jam=date_format($date, 'H:i:s');
            $data[$i]['id'] = $datas[$i]['id'];
            $data[$i]['nup'] = $datas[$i]['nup'];
            $data[$i]['izin'] = $datas[$i]['ijin'];
            $data[$i]['ketizin'] = $izin;
            $data[$i]['keterangan'] = $datas[$i]['keterangan'];
            $data[$i]['approved'] = $datas[$i]['approved'];
            $data[$i]['nup_approved'] = $datas[$i]['nup_approved'];
            $data[$i]['tgl_approved'] = $datas[$i]['tgl_approved'];
            $data[$i]['tgl'] = $tgl;
            $data[$i]['jam'] = $jam;
        }

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }
}
