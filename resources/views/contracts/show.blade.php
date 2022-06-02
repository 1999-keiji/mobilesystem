@extends('layouts.app')

@section('content')
<div class="sidebar">
<ul>
    <li><a href="#"><img src="{{asset('/dashboard-icon.png')}}" alt="">　ダッシュボード</a></li>
    <li class="active"><a href="/"><img src="{{asset('/sales-icon.png')}}" alt="">　販売管理</a></li>
      <li class="active"><a href="/sale">　　・販売一覧</a></li>
      <li class="active"><a href="/contract">　　・継続契約</a></li>
      <li class="active"><a href="/sell">　　・販売登録</a></li>
    <li><a href="/fix/new"><img src="{{asset('/fixes-icon.png')}}" alt="">　修理記録</a></li>
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
        <h3>契約内容</h3>
        <p></p>
      </div>
      <div class="white-box" style="width: 50%;">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th scope="row" class="bg-light">契約者名</th>
              <td class="d-block">{{$contract->customer->name}}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">契約者ID</th>
              <td class="d-block">{{$contract->customer->number?? '---'}}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">契約者区分</th>
              <td class="d-block">
                @if($contract->customer->status == 1)
                個人
                @endif</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">契約開始日</th>
              <td class="d-block">{{$contract['contract-date']}}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">初回事務手数料</th>
              <td class="d-block">¥{{$contract['contract-fee']?? '0'}}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">契約状況</th>
              <td class="d-block">
                @if($contract->status == 1)
                契約中
                @elseif($contract->status == 0)
                解約済み
                @endif</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">プラン名</th>
              @foreach($plans as $p)
              <td class="d-block">・{{$p['plan-name']}}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row" class="bg-light">月額料金</th>
              <td class="d-block">¥{{$contract->bill}}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">月額インセンティブ</th>
              <td class="d-block">¥{{$contract->incentive}}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">前回支払日</th>
              <td class="d-block">{{$contract['confirmation-date']?? '---'}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <p class="text-end" style="width: 50%;"><a href="/contract/{{$contract['id']}}/renew" class="btn btn-secondary">更新する</a></p>
    </div>
  </div>
  
</div>

@endsection