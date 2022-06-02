@extends('layouts.app')

@section('content')

<div class="sidebar">
  <ul>
    <li class="active"><a href="#"><img src="/dashboard-icon.png" alt="">　ダッシュボード</a></li>
    <li class="active"><a href="/sales/today"><img src="/sales-icon.png" alt="">　販売管理</a></li>
      <li class="active"><a href="/">　　・記録一覧</a></li>
      <li class="active"><a href="/sales">　　・販売登録</a></li>
    <li><a href="/fix/new"><img src="/fixes-icon.png" alt="">　修理管理</a></li>
    <li><a href="/stock"><img src="/stocks-icon.png" alt="">　在庫管理</a></li>
    <li><a href="/supply/parts"><img src="/parts-icon.png" alt="">　部材管理</a></li>
    <li><a href="/proceeds"><img src="/proceeds-icon.png" alt="">　売上管理</a></li>
    <li><a href="/shop"><img src="/shops-icon.png" alt="">　店舗情報</a></li>
  </ul> 
</div>
<div class="main_content">
<div class="d-flex justify-content-center">
    <div class="main-box py-5">
      <div class="d-flex justify-content-between mb-2">
        <h3>本日の販売登録</h3>
        <p></p>
      </div>
      <div class="white-box">
        <table class="table  table-hover table-bordered text-center table-striped">
          <thead class="gray-box">
            <tr>
              <th scope="col">仕入れ日</th>
              <th scope="col">メーカー</th>
              <th scope="col">機種名</th>
              <th scope="col">商品内容</th>
              <th scope="col" style="width:80px;">使用数</th>
              <th scope="col" style="width:80px;">不良数</th>
              <th scope="col" style="width:80px;">残量</th>
            </tr>
          </thead>
          <tbody>
            @for($i=0;$i < 10;$i++)
            <tr>
              <td><a href="https://google.com" class="d-block">2022/01/{{20-$i}}</a></td>
              <td>Apple</td>
              <td>iPhone7</td>
              <td>バッテリー</td>
              <td>{{$i+1}}</td>
              <td>1</td>
              <td>{{$i}}</td>
            </tr>
            @endfor
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection