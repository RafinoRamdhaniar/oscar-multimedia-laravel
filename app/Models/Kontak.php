<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
        'id',            // tambahkan ini
        'alamat',
        'email',
        'maps_link',
        'whatsapp_link',
    ];
}
