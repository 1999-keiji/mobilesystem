@extends('layouts.app')

@section('content')

<div class="sidebar">
<ul>
    <li><a href="{{asset('#')}}"><img src="{{asset('/dashboard-icon.png')}}" alt="">　ダッシュボード</a></li>
    <li class="active"><a href="{{asset('/')}}"><img src="{{asset('/sales-icon.png')}}" alt="">　販売管理</a></li>
      <li class="active"><a href="/sale">　　・販売一覧</a></li>
      <li class="active"><a href="/contract">　　・継続契約</a></li>
      <li class="active"><a href="/sell">　　・販売登録</a></li>
    <li><a href="{{asset('/fix/new')}}"><img src="{{asset('/fixes-icon.png')}}" alt="">　修理管理</a></li>
    <li><a href="{{asset('/stock')}}"><img src="{{asset('/stocks-icon.png')}}" alt="">　在庫管理</a></li>
    <li><a href="{{asset('/supply/parts')}}"><img src="{{asset('/parts-icon.png')}}" alt="">　部材仕入</a></li>
    <li><a href="{{asset('/proceeds')}}"><img src="{{asset('/proceeds-icon.png')}}" alt="">　集計管理</a></li>
    <li><a href="{{asset('/shop')}}"><img src="{{asset('/shops-icon.png')}}" alt="">　店舗情報</a></li>
  </ul> 
</div>
<div class="main_content">
  <div class="d-flex justify-content-center">
    <div class="main-box py-5">
      <div class="d-flex justify-content-between mb-2">
        <h3>販売詳細情報ID: OOOO </h3>
        <p></p>
      </div>
      <div class="white-box">
        来客名
        {{$sale->customer->name?? '---'}}
      </div>
    </div>
  </div>
  
</div>

@endsection