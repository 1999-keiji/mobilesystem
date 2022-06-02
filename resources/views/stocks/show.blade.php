@extends('layouts.app')

@section('content')

<div class="sidebar">
<ul>
    <li><a href="#"><img src="{{asset('/dashboard-icon.png')}}" alt="">　ダッシュボード</a></li>
    <li><a href="/"><img src="{{asset('/sales-icon.png')}}" alt="">　販売管理</a></li>
    <li><a href="/fix/new"><img src="{{asset('/fixes-icon.png')}}" alt="">　修理管理</a></li>
    <li class="active"><a href="/stock"><img src="{{asset('/stocks-icon.png')}}" alt="">　在庫管理</a></li>
    <li class="active"><a href="/stock/parts">　　・修理パーツ</a></li>
    <li class="active"><a href="/stock/phone">　　・中古端末</a></li>
    <li class="active"><a href="/stock/other">　　・その他</a></li>
    <li><a href="/supply/parts"><img src="{{asset('/parts-icon.png')}}" alt="">　部材仕入</a></li>
    <li><a href="/proceeds"><img src="{{asset('/proceeds-icon.png')}}" alt="">　集計管理</a></li>
    <li><a href="/shop"><img src="{{asset('/shops-icon.png')}}" alt="">　店舗情報</a></li>
  </ul> 
</div>
<div class="main_content">
  <div class="d-flex justify-content-center">
    <div class="main-box py-5">
      <div class="d-flex justify-content-between mb-2">
        <h3>在庫詳細 </h3>
        <p></p>
      </div>
      <div class="white-box">
        未実装
      </div>
    </div>
  </div>
  
</div>

@endsection