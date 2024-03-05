<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Html\Editor\Fields\Radio;

class Paybill extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "radio",
        "shortcode",
        "initiator",
        "SecurityCredential",
        "key",
        "secret",
        "passkey",
    ];

    public function radio()
    {
        return $this->belongsTo(Radio::class, 'radio', 'id');
    }
}
