<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ijin extends Model{
    protected $table = "ijin";

    protected $fillable = [
        "nup", 
        "kodedivisi", 
        "ijin",
        "keterangan",
        "approved",
        "nup_approved",
        "tgl_approved",
        "created_at",
        "updated_at"
    ];

    protected $primaryKey = "id";

    public $timestamps = false;
}