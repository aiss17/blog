<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trx extends Model{
    protected $table = "trx";

    protected $fillable = [
        "id",
        "nup",
        "latitude",
        "longitude",
        "status_clock",
        "datetime_trx",
        "status_position",
        "status_pull",
        "datetime_pull",
        "gambar"
    ];

    protected $primaryKey = "id";

    public $timestamps = false;
}