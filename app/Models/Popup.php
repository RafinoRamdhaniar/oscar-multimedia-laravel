<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Popup extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'is_active',
    ];
}
