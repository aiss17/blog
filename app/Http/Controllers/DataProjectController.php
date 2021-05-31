<?php

namespace App\Http\Controllers;

use App\Models\DataProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataProjectController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // echo "Hi ";
    }

    public function getAll() {
        $data = DataProject::all();

        return response()->json(['data' => $data, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getProject() {
        $datas = DB::table('data_project AS a')
                ->select(
                    DB::raw('ROW_NUMBER() OVER(ORDER BY id ASC) AS nomor'),
                    'a.id',
                    'a.id_sbu_cabang',
                    'b.nama_sbu_cabang',
                    'a.so_number',
                    'a.kode_project',
                    'a.nama_project',
                    'a.id_sektor_jasa',
                    'a.kodea',
                    'a.kodeb',
                    'a.kodec',
                    'a.nama_pelanggan',
                    'a.lokasi_project',
                    'a.no_kontrak',
                    'a.nilai_project',
                    'a.no_surat',
                    'a.tgl_surat',
                    'a.status'
                    )
                ->leftJoin('m_sbu_cabang AS b', function($join) {
                    $join->on('a.id_sbu_cabang', '=', 'b.id');})
                ->orderBy('a.id', 'DESC')
                ->get();
        
        return response()->json(['data' => $datas, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getProjectApp($id_sbu_cabang, $status) {
        $datas = DB::table('data_project AS a')
                ->select(
                    DB::raw('ROW_NUMBER() OVER(ORDER BY id ASC) AS nomor'),
                    'a.id',
                    'a.id_sbu_cabang',
                    'b.nama_sbu_cabang',
                    'a.so_number',
                    'a.kode_project',
                    'a.nama_project',
                    'a.id_sektor_jasa',
                    'a.kodea',
                    'a.kodeb',
                    'a.kodec',
                    'a.nama_pelanggan',
                    'a.lokasi_project',
                    'a.no_kontrak',
                    'a.nilai_project',
                    'a.no_surat',
                    'a.tgl_surat',
                    'a.status'
                    )
                ->leftJoin('m_sbu_cabang AS b', function($join) {
                    $join->on('a.id_sbu_cabang', '=', 'b.id');})
                ->where('a.id_sbu_cabang', '=', $id_sbu_cabang)
                ->where('a.status', '=', $status)
                ->orderBy('a.id', 'DESC')
                ->get();
        
        return response()->json(['data' => $datas, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getProjectCabang($id_sbu_cabang) {
        $datas = DB::table('data_project AS a')
                ->select(
                    DB::raw('ROW_NUMBER() OVER(ORDER BY id ASC) AS nomor'),
                    'a.id',
                    'a.id_sbu_cabang',
                    'b.nama_sbu_cabang',
                    'a.so_number',
                    'a.kode_project',
                    'a.nama_project',
                    'a.id_sektor_jasa',
                    'a.kodea',
                    'a.kodeb',
                    'a.kodec',
                    'a.nama_pelanggan',
                    'a.lokasi_project',
                    'a.no_kontrak',
                    'a.nilai_project',
                    'a.no_surat',
                    'a.tgl_surat',
                    'a.status'
                    )
                ->leftJoin('m_sbu_cabang AS b', function($join) {
                    $join->on('a.id_sbu_cabang', '=', 'b.id');})
                ->where('a.id_sbu_cabang', '=', $id_sbu_cabang)
                ->orderBy('a.id', 'DESC')
                ->get();
        
        return response()->json(['data' => $datas, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getProjectDroping($so_number) {
        $datas = DB::table('data_project AS a')
                ->select(
                    'a.id',
                    'a.id_sbu_cabang',
                    'b.nama_sbu_cabang',
                    'a.so_number',
                    'a.id_tender',
                    'a.id_sektor_jasa',
                    'a.status_project',
                    'a.kode_project',
                    'a.nama_project',
                    'a.kodea',
                    'a.kodeb',
                    'a.kodec',
                    'a.nama_pelanggan',
                    'a.lokasi_project',
                    'a.nilai_project',
                    'a.lingkup_pekerjaan',
                    'a.pic',
                    'a.alamat_pic',
                    'a.telp_pic',
                    'a.no_surat',
                    'a.tgl_surat',
                    'a.nup_pm',
                    'a.nama_pm',
                    'a.tgl_mulai',
                    'a.tgl_selesai',
                    'a.no_kontrak',
                    DB::raw('DATEDIFF(a.tgl_selesai,a.tgl_mulai)AS selisih'),
                    'a.status',
                    'a.tandatangan',
                    'a.nup_approve'
                    )
                ->leftJoin('m_sbu_cabang AS b', function($join) {
                    $join->on('a.id_sbu_cabang', '=', 'b.id');})
                ->where('a.so_number', '=', $so_number)
                ->where('a.nup_approve', '!=', null)
                ->orderBy('a.id', 'DESC')
                ->get();
        
        return response()->json(['data' => $datas, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getProjectByID($id) {
        $datas = DB::table('data_project AS a')
                ->select(
                    'a.id',
                    'a.id_sbu_cabang',
                    'b.nama_sbu_cabang',
                    'a.so_number',
                    'a.id_tender',
                    'a.id_sektor_jasa',
                    'a.status_project',
                    'a.kode_project',
                    'a.nama_project',
                    'a.kodea',
                    'a.kodeb',
                    'a.kodec',
                    'a.nama_pelanggan',
                    'a.lokasi_project',
                    'a.nilai_project',
                    'a.lingkup_pekerjaan',
                    'a.pic',
                    'a.alamat_pic',
                    'a.telp_pic',
                    'a.no_surat',
                    'a.tgl_surat',
                    'a.nup_pm',
                    'a.nama_pm',
                    'a.tgl_mulai',
                    'a.tgl_selesai',
                    'a.no_kontrak',
                    DB::raw('DATEDIFF(a.tgl_selesai,a.tgl_mulai)AS selisih'),
                    'a.status',
                    'a.tandatangan',
                    'a.nup_approve'
                    )
                ->leftJoin('m_sbu_cabang AS b', function($join) {
                    $join->on('a.id_sbu_cabang', '=', 'b.id');})
                ->where('a.id', '=', $id)
                ->orderBy('a.id', 'DESC')
                ->get();
        
        return response()->json(['data' => $datas, 'message' => "Berhasil mengambil data!"], 200);
    }

    public function getProjectNup($nup) {
        $datas = DB::table('data_project AS a')
                ->select(
                    DB::raw('ROW_NUMBER() OVER(ORDER BY id ASC) AS nomor'),
                    'a.id',
                    'a.id_sbu_cabang',
                    'b.nama_sbu_cabang',
                    'a.so_number',
                    'a.kode_project',
                    'a.nama_project',
                    'a.id_sektor_jasa',
                    'a.kodea',
                    'a.kodeb',
                    'a.kodec',
                    'a.nama_pelanggan',
                    'a.lokasi_project',
                    'a.no_kontrak',
                    'a.nilai_project',
                    'a.no_surat',
                    'a.tgl_surat',
                    'a.status'
                    )
                ->leftJoin('m_sbu_cabang AS b', function($join) {
                    $join->on('a.id_sbu_cabang', '=', 'b.id');})
                ->where('a.nup_pm', '=', $nup)
                ->orderBy('a.id', 'DESC')
                ->get();
        
        return response()->json(['data' => $datas, 'message' => "Berhasil mengambil data!"], 200);
    }
}
