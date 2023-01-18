<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert(array(
            [
                'nama_perusahaan' => 'Warung Nusantara',
                'alamat_perusahaan' => 'Jalan Nyamplungan Balokan no 57',
                'telepon_perusahaan' => '082131999990',
                'logo' => 'logo.png',
                'kartu_member' => 'card.png',
                'diskon_member' => '10',
                'tipe_nota' => '0',
            ],
        ));
    }
}
