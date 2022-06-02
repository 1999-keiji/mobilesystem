@extends('layouts.app')

@section('content')

<div class="sidebar">
<ul>
    <li><a href="{{asset('#')}}"><img src="{{asset('/dashboard-icon.png')}}" alt="">　ダッシュボード</a></li>
    <li><a href="{{asset('/')}}"><img src="{{asset('/sales-icon.png')}}" alt="">　販売管理</a></li>
    <li><a href="{{asset('/fix/new')}}"><img src="{{asset('/fixes-icon.png')}}" alt="">　修理管理</a></li>
    <li class="active"><a href="{{asset('/stock')}}"><img src="{{asset('/stocks-icon.png')}}" alt="">　在庫管理</a></li>
    <li class="active"><a href="{{asset('/stock/parts')}}">　　・修理パーツ</a></li>
    <li class="active"><a href="{{asset('/stock/phone')}}">　　・中古端末</a></li>
    <li class="active"><a href="{{asset('/stock/other')}}">　　・その他</a></li>
    <li><a href="{{asset('/supply/parts')}}"><img src="{{asset('/parts-icon.png')}}" alt="">　部材仕入</a></li>
    <li><a href="{{asset('/proceeds')}}"><img src="{{asset('/proceeds-icon.png')}}" alt="">　集計管理</a></li>
    <li><a href="{{asset('/shop')}}"><img src="{{asset('/shops-icon.png')}}" alt="">　店舗情報</a></li>
  </ul> 
</div>
<div class="main_content">
  <div class="d-flex justify-content-center">
    <div class="main-box py-5">
      <div class="d-flex justify-content-between mb-2">
        <h3>スマホ一覧</h3>
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
            @foreach($stocks as $s)
            <tr>
              <td style="padding:0;"><a href="{{asset('/stock/'.{{$s['id'])}}" class="d-block">{{$s['supply-date']->format('Y/m/d')}}</a></td>
              <td style="padding:0;"><a href="{{asset('/stock/'.{{$s['id'])}}" class="d-block">{{$s->maker['name']}}</a></td>
              <td style="padding:0;"><a href="{{asset('/stock/'.{{$s['id'])}}" class="d-block">{{$s->type['name']}}</a></td>
              <td style="padding:0;"><a href="{{asset('/stock/'.{{$s['id'])}}" class="d-block">{{$s->name}}</a></td>
              <td style="padding:0;"><a href="{{asset('/stock/'.{{$s['id'])}}" class="d-block">{{$s->inventory['consumption']}}</a></td>
              <td style="padding:0;"><a href="{{asset('/stock/'.{{$s['id'])}}" class="d-block">{{$s->inventory['deadstock']}}</a></td>
              <td style="padding:0;"><a href="{{asset('/stock/'.{{$s['id'])}}" class="d-block">{{$s->inventory['quantity']}}</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>

@endsection