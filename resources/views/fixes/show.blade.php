@extends('layouts.app')

@section('content')

<div class="sidebar">
  <ul>
    <li><a href="{{asset('#')}}"><img src="{{asset('/dashboard-icon.png')}}" alt="">　ダッシュボード</a></li>
    <li><a href="{{asset('/')}}"><img src="{{asset('/sales-icon.png')}}" alt="">　販売管理</a></li>
    <li class="active"><a href="{{asset('/fix/new')}}"><img src="{{asset('/fixes-icon.png')}}" alt="">　修理記録</a></li>
    <li class="active"><a href="{{asset('/fix')}}"><img src="{{asset('/fixes-icon.png')}}" alt="">　修理一覧</a></li>
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
        <h3>修理管理</h3>
        <p>*は必須入力</p>
      </div>
      <div class="white-box">
        <form action="/supply/create" method="post" class="form">
        @csrf
          未実装
        </form>
      </div>
    </div>
  </div>
</div>

@endsection