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
        <h3>修理記録の一覧画面</h3>
        <p></p>
      </div>
      <div class="white-box">
        <table class="table table-hover table-bordered text-center table-striped">
          <thead class="gray-box">
            <tr>
              <th scope="col">更新日</th>
              <th scope="col">ステータス</th>
              <th scope="col">契約者</th>
              <th scope="col">プラン名等</th>
              <th scope="col">月額料金</th>
              <th scope="col">契約報酬</th>
              <th scope="col">決済</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>

@endsection