@extends('layouts.app')

@section('content')

<div class="sidebar">
<ul>
    <li><a href="{{asset('#')}}"><img src="{{asset('/dashboard-icon.png')}}" alt="">　ダッシュボード</a></li>
    <li class="active"><a href="{{asset('/')}}"><img src="{{asset('/sales-icon.png')}}" alt="">　販売管理</a></li>
      <li class="active"><a href="{{asset('/sale')}}">　　・販売一覧</a></li>
      <li class="active"><a href="{{asset('/contract')}}">　　・継続契約</a></li>
      <li class="active"><a href="{{asset('/sell')}}">　　・販売登録</a></li>
    <li><a href="{{asset('/fix/new')}}"><img src="{{asset('/fixes-icon.png')}}" alt="">　修理記録</a></li>
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
        <h3>継続契約一覧</h3>
        <a href="{{asset('/contract/new')}}" class="d-block btn btn-primary">新規契約</a>
      </div>
      <!-- 成功アラート -->
      <!-- <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          An example success alert with an icon
        </div>
      </div> -->
      <!-- 成功アラート -->
      <div class="white-box">
        <table class="table table-hover table-bordered text-center table-striped">
          <thead class="gray-box">
            <tr>
              <th scope="col">契約日</th>
              <th scope="col">ステータス</th>
              <th scope="col">契約者</th>
              <th scope="col">プラン名等</th>
              <th scope="col">月額料金</th>
              <th scope="col">契約報酬</th>
              <th scope="col">前回支払日</th>
              <!-- <th scope="col">決済</th> -->
            </tr>
          </thead>
          <tbody>
            @foreach($contracts as $c)
            <tr>
              <td style="padding: 0;"><a href="{{asset('/contract/'.$c[0]['id'])}}" class="d-block">
                {{$c[0]['contract-date']}}</a></td>
              <td style="padding: 0;"><a href="{{asset('/contract/'.$c[0]['id'])}}" class="d-block">
                @if($c[0]['status']==1)契約中
                @elseif($c[0]['status']==0)解約済み
                @endif
              </a></td>
              <td style="padding: 0;"><a href="{{asset('/contract/'.$c[0]['id'])}}" class="d-block">{{$c[0]->customer->name}}</a></td>
              <td style="padding: 0;"><a href="{{asset('/contract/'.$c[0]['id'])}}" class="d-block">{{$c[0]['plan-name']}} 等</a></td>
              <td style="padding: 0;"><a href="{{asset('/contract/'.$c[0]['id'])}}" class="d-block">¥{{$c[0]->bill}}</a></td>
              <td style="padding: 0;"><a href="{{asset('/contract/'.$c[0]['id'])}}" class="d-block">¥{{$c[0]->incentive}}</a></td>
              <td style="padding: 0;"><a href="{{asset('/contract/'.$c[0]['id'])}}" class="d-block">{{$c[0]['confirmation-date']?? '---'}}</a></td>
              <!-- <td style="padding: 0;"><a href="/contract/{{$c[0]['id']}}" class="d-block">未確定</a></td> -->
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>

@endsection