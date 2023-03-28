<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siswa')->insert([
            'nis'=>'1000',
            'nama'=>'Thoriq Hanif',
            'level'=>'admin',
            'asal'=>'SMKN 6 SURAKARTA',
            'alamat'=>'Boyolali',
            'created_at'=>date('Y-m-d h:i:s')
        ]);
    }
}
