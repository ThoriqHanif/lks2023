<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nis','nama','level','asal','alamat'];
    use HasFactory;
}
