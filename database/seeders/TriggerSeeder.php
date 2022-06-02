<?php

namespace Database\Seeders;

use App\Models\Trigger;
use Illuminate\Database\Seeder;

class TriggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Trigger::create([
          'name'=>'電話予約'
        ]);
        Trigger::create([
          'name'=>'メール予約'
        ]);
        Trigger::create([
          'name'=>'飛び込み'
        ]);
        Trigger::create([
          'name'=>'紹介'
        ]);
        Trigger::create([
          'name'=>'リピーター'
        ]);
    }
}
