@extends('layouts.app')

@section('content')

<div class="sidebar">
<ul>
    <li><a href="#"><img src="{{asset('/dashboard-icon.png')}}" alt="">　ダッシュボード</a></li>
    <li class="active"><a href="/"><img src="{{asset('/sales-icon.png')}}" alt="">　販売管理</a></li>
      <li class="active"><a href="/sale">　　・販売一覧</a></li>
      <li class="active"><a href="/contract">　　・継続契約</a></li>
      <li class="active"><a href="/sell">　　・販売登録</a></li>
    <li><a href="/fix/new"><img src="{{asset('/fixes-icon.png')}}" alt="">　修理管理</a></li>
    <li><a href="/stock"><img src="{{asset('/stocks-icon.png')}}" alt="">　在庫管理</a></li>
    <li><a href="/supply/parts"><img src="{{asset('/parts-icon.png')}}" alt="">　部材仕入</a></li>
    <li><a href="/proceeds"><img src="{{asset('/proceeds-icon.png')}}" alt="">　集計管理</a></li>
    <li><a href="/shop"><img src="{{asset('/shops-icon.png')}}" alt="">　店舗情報</a></li>
  </ul> 
</div>
<div class="main_content">
  <div class="d-flex justify-content-center">
    <div class="main-box py-5">
      <div class="d-flex justify-content-between mb-2">
        <h3>販売一覧</h3>
        <a href="/sell" class="d-block btn btn-primary">販売登録</a>
      </div>
      <div class="white-box">
        <table class="table table-hover table-bordered text-center table-striped">
          <thead class="gray-box">
            <tr>
              <th scope="col">販売日</th>
              <th scope="col">分類</th>
              <th scope="col">来客名</th>
              <th scope="col">内容</th>
              <th scope="col">価格(税込)</th>
              <th scope="col">支払い方法</th>
              <th scope="col">担当者</th>
              <!-- <th scope="col" style="width:80px;">使用数</th>
              <th scope="col" style="width:80px;">不良数</th>
              <th scope="col" style="width:80px;">残量</th> -->
            </tr>
          </thead>
          <tbody>
          @foreach($sales as $s)
            <tr>
              <td style="padding:0;"><a href="/sale/{{$s['id']}}" class="d-block">{{$s['sales-date']}}</a></td>
              <td style="padding:0;"><a href="/sale/{{$s['id']}}" class="d-block">{{$s->category->name?? '不明'}}</a></td>
              <td style="padding:0;"><a href="/sale/{{$s['id']}}" class="d-block">{{$s->customer->name?? '---'}}</a></td>
              <td style="padding:0;"><a href="/sale/{{$s['id']}}" class="d-block">{{$s->stock->name?? '不明'}}</a></td>
              <td style="padding:0;"><a href="/sale/{{$s['id']}}" class="d-block">{{$s['price']}}</a></td>
              <td style="padding:0;"><a href="/sale/{{$s['id']}}" class="d-block">{{$s->pay->name}}</a></td>
              <td style="padding:0;"><a href="/sale/{{$s['id']}}" class="d-block">{{$s->register}}</a></td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>

@endsection