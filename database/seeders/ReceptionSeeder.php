<?php

namespace Database\Seeders;

use App\Models\Reception;
use Illuminate\Database\Seeder;

class ReceptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Reception::create([
          'status'=>1,
          'name'=>'フロントパネル不良'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'バックパネル不良'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'バッテリー交換'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'防水シール'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'コーティング'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'フィルム交換'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'起動不可'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'水没復旧、基盤修理修理'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'リンゴループ修理'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'各種コントロールスイッチ修理'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'スピーカー不良'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'バイブ不良'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'マイク不良'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'アウトカメラ不良'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'インカメラ不良'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'イヤホンジャック不良'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'接近センサー不良'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'フレーム矯正'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'セルラードックコネクター不良'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'wifi受信不良'
        ]);
        Reception::create([
          'status'=>1,
          'name'=>'クリーニング'
        ]);
    }
}
