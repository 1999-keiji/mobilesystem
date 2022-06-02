<?php

namespace Database\Seeders;

use App\Models\Maker;
use Illuminate\Database\Seeder;

class MakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Maker::create([
          'name'=>'Apple'
        ]);
        Maker::create([
          'name'=>'Sony'
        ]);
        Maker::create([
          'name'=>'Huawei'
        ]);
        Maker::create([
          'name'=>'Google'
        ]);
        Maker::create([
          'name'=>'Fujitsu'
        ]);
        Maker::create([
          'name'=>'OPPO'
        ]);
        Maker::create([
          'name'=>'Xiaomi'
        ]);
        Maker::create([
          'name'=>'SHARP'
        ]);
        Maker::create([
          'name'=>'Samsung'
        ]);
    }
}
