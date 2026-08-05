<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

   // Pastikan kolom-kolom ini terdaftar di $fillable
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];
}