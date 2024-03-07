<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "shortcode",
        "created_by",
    ];
    public function paybill()
    {
        return $this->belongsTo(Paybill::class, 'shortcode', 'shortcode');
    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'shortcode', 'shortcode');
    }
}
