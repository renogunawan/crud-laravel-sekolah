<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 
        'nama_peminjam',
         'buku', 
         'tgl_pinjam',
         'tgl_kembali',
            ];
    
}
