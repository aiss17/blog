<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataProject extends Model{
    protected $table = "data_project";

    protected $fillable = [
        "id",
        "id_sbu_cabang",
        "so_number",
        "status_project",
        "id_sektor_jasa",
        "id_tender",
        "kode_project",
        "nama_project",
        "kodea",
        "kodeb",
        "kodec",
        "nama_pelanggan",
        "pic",
        "alamat_pic",
        "telp_pic",
        "email_pic",
        "lokasi_project",
        "tgl_mulai",
        "tgl_selesai",
        "no_kontrak",
        "file_name",
        "nilai_project",
        "lingkup_pekerjaan",
        "nup_pm",
        "nama_pm",
        "no_surat",
        "tgl_surat",
        "nup_approve",
        "tgl_approve",
        "tandatangan",
        "status",
        "id_close",
        "tgl_close",
        "file_name_close",
        "nup_approve_close",
        "tgl_approve_close",
        "id_user",
        "created_at",
        "updated_at",
        "keterangan_code"
    ];

    protected $primaryKey = "id";

    public $timestamps = false;
}