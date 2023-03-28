<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masuk extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = ['nama_kategori','nama_barang','created_at','updated_at'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}

