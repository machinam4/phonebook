<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        "phone_number",
        "names",
        "first_name",
        "middle_name",
        "last_name",
        "paybill_id",
        "shortcode",
    ];
}
