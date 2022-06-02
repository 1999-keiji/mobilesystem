@extends('layouts.app')

@section('content')
<link href="/css/selmodal.css" rel="stylesheet">
<div class="sidebar">
  <ul>
    <li><a href="#"><img src="/dashboard-icon.png" alt="">　ダッシュボード</a></li>
    <li><a href="/"><img src="/sales-icon.png" alt="">　販売管理</a></li>
    <li><a href="/fix/new"><img src="/fixes-icon.png" alt="">　修理管理</a></li>
    <li><a href="/stock"><img src="/stocks-icon.png" alt="">　在庫管理</a></li>
    <li><a href="/supply/parts"><img src="/parts-icon.png" alt="">　部材管理</a></li>
    <li class="active"><a href="/proceeds"><img src="/proceeds-icon.png" alt="">　集計管理</a></li>
    <li><a href="/shop"><img src="/shops-icon.png" alt="">　店舗情報</a></li>
  </ul> 
</div>
<div class="main_content">
<div class="d-flex justify-content-center">
    <div class="main-box py-5">
      <div class="d-flex justify-content-between mb-2">
        <h3>集計管理</h3>
        <p></p>
      </div>
      <div class="white-box">
        <form action="# " method="post" class="form">
        @csrf
          未実装
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
