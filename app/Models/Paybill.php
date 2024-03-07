<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paybill extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "radio", //replaced by channel
        "shortcode",
        "initiator",
        "SecurityCredential",
        "key",
        "secret",
        "passkey",
    ];

    public function channel()
    {
        return $this->hasOne(Channels::class, 'radio', 'id');
    }
}
