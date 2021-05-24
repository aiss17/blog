<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model{
    protected $table = "faq";

    protected $fillable = [
        "id",
        "pertanayaan",
        "jawaban",
        "created_at"
    ];

    protected $primaryKey = "id";

    public $timestamps = false;
}