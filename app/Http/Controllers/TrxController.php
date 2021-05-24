<?php

namespace App\Http\Controllers;

use App\Models\Trx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrxController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // echo "Hi ";
    }

    public function getAll() {
        $data = Trx::all();

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getByNup($nup) {
        $datas = Trx::where('nup', '=', $nup)->orderBy('datetime_trx', 'DESC')->get();

        $count = count($datas);
        for ($i=0; $i < $count; $i++) { 
            $data[] = array();

            if ($datas[$i]['status_clock']=='1'){
                $status='Clock In';
            } elseif ($datas[$i]['status_clock']=='2'){
                $status='Break';
            } elseif ($datas[$i]['status_clock']=='3'){
                $status='After Break';
            } elseif ($datas[$i]['status_clock']=='4'){
                $status='Clock Out';
            }

            $date = date_create($datas[$i]['created_at']);
            $tgl=date_format($date, 'd-m-Y');
            $jam=date_format($date, 'H:i:s');
            $data[$i]['id'] = $datas[$i]['id'];
            $data[$i]['nup'] = $datas[$i]['nup'];
            $data[$i]['latitude'] = $datas[$i]['latitude'];
            $data[$i]['longitude'] = $datas[$i]['longitude'];
            $data[$i]['status_clock'] = $status;
            $data[$i]['status_position'] = $datas[$i]['status_position'];
            $data[$i]['tgl'] = $tgl;
            $data[$i]['jam'] = $jam;
        }

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }
}
