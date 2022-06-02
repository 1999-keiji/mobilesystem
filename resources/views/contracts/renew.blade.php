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
        <h3>契約更新</h3>
        <p></p>
      </div>
      <div class="white-box">
        <form action="{{route('contract.update', $contract->id)}}"  method="post" class="form">
        @csrf
        <div class="form-content col-10 py-4 d-flex flex-wrap justify-content-evenly mx-auto">
            @if ($errors->any())
            <div class="alert alert-danger col-5">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-5"></div>
            @endif
            <div class="form-group col-5 py-2">
              <label for="">お客様名*</label>
              <p class="fs-5">{{$contract->customer->name}}</p>
            </div>
            <div class="form-group col-5 py-2">
              <label for="">お客様番号*</label>
              <p class="fs-5">{{$contract->customer->number}}</p>
            </div>
            <div class="form-group col-5 py-2">プラン名</div>
            <div class="form-group col-5 py-2">月額料金</div>
            <!-- foreach構文 -->
            @foreach($all_plan as $p)
            <div class="form-group col-5 py-1">
              <div class="monthly-cost">
                <input type="checkbox" name="plan[]" id="{{$p['monthly-cost']}}" value="{{$p['id']}}" @if(in_array($p['id'],$plans)) checked @endif>
                <label for="">{{$p['plan-name']}}</label>
              </div>
            </div>
            <div class="form-group col-5 py-1">
              <p class="monthly-cost" id="monthly-cost">¥{{$p['monthly-cost']}}-</p>
            </div>
            @endforeach
            <!-- foreach構文 -->
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">データ通信利用料</label>
              <input type="text" name="data-traffic-cost" class="form-control" id="data-traffic-cost" placeholder="半角数字で入力してください">
            </div>
            @if($contract['confirmation-date'] == null)
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">初回事務手数料</label>
              <p>¥{{$contract['contract-fee']}}-</p>
            </div>
            @endif
            <div class="form-group col-11 py-2 border-top mt-3"></div>
            <div class="form-group col-5"></div>
            <div class="form-group col-5">
              <label for="">合計金額</label>
              <!-- <p class="bill-view" id="bill-view">¥0</p> -->
              <input type="text" name="bill" class="bill form-control" id="bill" value="{{$contract['bill']}}">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">確定日</label>
              <input type="date" class="form-control" value="{{$today}}" name="confirmation-date">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">登録担当者*</label>
              <div class="">
                <input type="hidden" value="" name="confirmation-user">
                @foreach($user as $u)
                <input type="radio" value="{{$u['id']}}" name="confirmation-user" id="">
                <span>{{$u['name']}}</span>
                @endforeach
              </div>
            </div>
            <div class="form-group col-5 py-2">
              <label for="">備考</label>
              <textarea name="remarks" id="" cols="30" rows="5" class="form-control" placeholder="入力してください"></textarea>
            </div>
            <div class="form-group col-5"></div>
          </div>
          <div class="pb-4"><button class="btn btn-success mx-auto d-block" name="">確定する</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  window.addEventListener('DOMContentLoaded', function(){
    var bill = document.getElementById('bill');
    var plans = document.getElementsByName('plan[]');
    var dtc = document.getElementById('data-traffic-cost');
    var plan_cost = bill.value;
    for(let plan of plans){
      plan.addEventListener('change', function(){
        if(plan.checked == true){
          plan_cost = Number(bill.value) + Number(plan.id);
        }else if(plan.checked == false){
          plan_cost = Number(bill.value) - Number(plan.id);
        }
        bill.value = plan_cost;
      })
    }
    dtc.addEventListener('input', function adjust(){
      // console.log(plan_cost);
      bill_cost = Number(plan_cost) + Number(dtc.value);
      bill.value = bill_cost;
      // bill.value = Number(bill.value) + Number(dtc.value);
    });
  });
</script>

@endsection