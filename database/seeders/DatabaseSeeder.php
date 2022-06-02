<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Shop::create([
        'id'=>1,
        'name'=>"マルイ錦糸町"
      ]);
      \App\Models\Shop::create([
        'id'=>2,
        'name'=>"日立シーマークスクエア"
      ]);
      \App\Models\Shop::create([
        'id'=>3,
        'name'=>"岐阜"
      ]);
      \App\Models\Category::create([
      'id'=>1,
      'name'=>"修理",
      'type'=>"fix"
      ]);
      \App\Models\Category::create([
      'id'=>2,
      'name'=>"スマホ、タブレット",
      'type'=>"phone"
      ]);
      \App\Models\Category::create([
      'id'=>3,
      'name'=>"デバイス",
      'type'=>"device"
      ]);
      \App\Models\Category::create([
      'id'=>4,
      'name'=>"アクセサリー",
      'type'=>"accessory"
      ]);
      \App\Models\Category::create([
      'id'=>5,
      'name'=>"サービス",
      'type'=>"service"
      ]);
      \App\Models\Category::create([
      'id'=>6,
      'name'=>"消耗品",
      'type'=>"comsumables"
      ]);
      \App\Models\Category::create([
      'id'=>7,
      'name'=>"その他",
      'type'=>"other"
      ]);
      \App\Models\Pay::create([
        'id'=>1,
        'name'=>"現金"
      ]);
      \App\Models\Pay::create([
        'id'=>2,
      'name'=>"クレジットカード"
      ]);
      \App\Models\Pay::create([
        'id'=>3,
      'name'=>"QR決済"
      ]);
      \App\Models\Pay::create([
        'id'=>4,
      'name'=>"振り込み"
      ]);
      \App\Models\Plan::create([
        'id'=>1,
        'plan-name'=>'シン・プラン 0GB',
        'monthly-cost'=>980
      ]);
      \App\Models\Plan::create([
        'id'=>2,
        'plan-name'=>'シン・プラン 1GB',
        'monthly-cost'=>1280
      ]);
      \App\Models\Plan::create([
        'id'=>3,
        'plan-name'=>'シン・プラン 2GB',
        'monthly-cost'=>1380
      ]);
      \App\Models\Plan::create([
        'id'=>4,
        'plan-name'=>'シン・プラン 3GB',
        'monthly-cost'=>1480
      ]);
      \App\Models\Plan::create([
        'id'=>5,
        'plan-name'=>'シン・プラン 4GB',
        'monthly-cost'=>1580
      ]);
      \App\Models\Plan::create([
        'id'=>6,
        'plan-name'=>'シン・プラン 5GB',
        'monthly-cost'=>1680
      ]);
      \App\Models\Plan::create([
        'id'=>7,
        'plan-name'=>'シン・プラン 6GB',
        'monthly-cost'=>1780
      ]);
      \App\Models\Plan::create([
        'id'=>8,
        'plan-name'=>'シン・プラン 7GB',
        'monthly-cost'=>1980
      ]);
      \App\Models\Plan::create([
        'id'=>9,
        'plan-name'=>'シン・プラン 8GB',
        'monthly-cost'=>2080
      ]);
      \App\Models\Plan::create([
        'id'=>10,
        'plan-name'=>'シン・プラン 9GB',
        'monthly-cost'=>2180
      ]);
      \App\Models\Plan::create([
        'id'=>11,
        'plan-name'=>'シン・プラン 10GB',
        'monthly-cost'=>2280
      ]);
      \App\Models\Plan::create([
        'id'=>12,
        'plan-name'=>'シン・プラン 15GB',
        'monthly-cost'=>2380
      ]);
      \App\Models\Plan::create([
        'id'=>13,
        'plan-name'=>'シン・プラン 20GB',
        'monthly-cost'=>2480
      ]);
      \App\Models\Plan::create([
        'id'=>14,
        'plan-name'=>'スマートWiFi 5GB',
        'monthly-cost'=>2480
      ]);
      \App\Models\Plan::create([
        'id'=>15,
        'plan-name'=>'スマートWiFi 20GB',
        'monthly-cost'=>2980
      ]);
      \App\Models\Plan::create([
        'id'=>16,
        'plan-name'=>'スマートWiFi 50GB',
        'monthly-cost'=>4980
      ]);
      \App\Models\Plan::create([
        'id'=>17,
        'plan-name'=>'限界突破Wifi',
        'monthly-cost'=>3850
      ]);
      \App\Models\Plan::create([
        'id'=>18,
        'plan-name'=>'かけ放題ライト',
        'monthly-cost'=>550
      ]);
      \App\Models\Plan::create([
        'id'=>19,
        'plan-name'=>'かけ放題フル',
        'monthly-cost'=>1650
      ]);
      \App\Models\Plan::create([
        'id'=>20,
        'plan-name'=>'i-フィルター for マルチデバイス',
        'monthly-cost'=>396
      ]);
      \App\Models\Plan::create([
        'id'=>21,
        'plan-name'=>'キャッチホン',
        'monthly-cost'=>330
      ]);
      \App\Models\Plan::create([
        'id'=>22,
        'plan-name'=>'留守番電話',
        'monthly-cost'=>440
      ]);
      \App\Models\Plan::create([
        'id'=>23,
        'plan-name'=>'X-mobile 端末補償',
        'monthly-cost'=>770
      ]);
      \App\Models\Plan::create([
        'id'=>24,
        'plan-name'=>'X-mobile 持込み補償',
        'monthly-cost'=>770
      ]);
      \App\Models\Plan::create([
        'id'=>25,
        'plan-name'=>'SmartWifi端末補償',
        'monthly-cost'=>660
      ]);
      \App\Models\Plan::create([
        'id'=>26,
        'plan-name'=>'限界突破端末補償',
        'monthly-cost'=>550
      ]);
    }
}
