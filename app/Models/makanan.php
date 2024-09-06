<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class makanan extends Model
{
    use HasFactory;
    protected $table = 'daftar_makanan';
    protected $fillable = ['nama_makanan', 'deskripsi_singkat', 'deskripsi', 'resep','file_path'];
}
