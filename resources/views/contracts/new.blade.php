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
        <h3>継続契約記録</h3>
        <p></p>
      </div>
      <div class="white-box">
        <form action="{{route('contract.create')}}" method="post" class="form">
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
              <input type="text" class="form-control" list="customerList" name="customer" placeholder="例) 田中太郎" autocomplete="off">
              <datalist id="customerList">
                @foreach($customer as $c)
                <option value="{{$c['name']}}"></option>
                @endforeach
              </datalist>
              <div class="text-end d-block">
                <span>法人の場合</span>
                <input type="checkbox" class="text-end" name="company">
              </div>
            </div>
            <div class="form-group col-5 py-2">
              <label for="">お客様番号*</label>
              <input type="text" class="form-control" name="customer-number" placeholder="半角数字で入力してください">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">サービス開始日*</label>
              <input type="date" name="start" id="" class="form-control">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">初回事務手数料</label>
              <input type="text" name="contract-fee" class="form-control" id="contract-fee" placeholder="半角数字で入力してください">
            </div>
            <div class="form-group col-5 py-2">プラン名</div>
            <div class="form-group col-5 py-2">月額料金(税込)</div>
            <!-- foreach構文 -->
            @foreach($plans as $p)
            <div class="form-group col-5 py-1">
              <div class="monthly-cost">
                <input type="checkbox" name="plan[]" id="{{$p['monthly-cost']}}" value="{{$p['id']}}">
                <label for="">{{$p['plan-name']}}</label>
              </div>
            </div>
            <div class="form-group col-5 py-1">
              <p class="monthly-cost" id="monthly-cost">¥{{$p['monthly-cost']}}-</p>
            </div>
            @endforeach
            <!-- foreach構文 -->
            <div class="form-group col-11 py-2 border-top mt-3"></div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5">
              <label for="">合計金額</label>
              <p class="bill-view" id="bill-view">¥0</p>
              <input type="hidden" name="bill" class="bill" id="bill">
            </div>
          </div>
          <div class="pb-4"><button class="btn btn-success mx-auto d-block" name="">保存する</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  window.addEventListener('DOMContentLoaded', function(){
    var bill = document.getElementById('bill');
    var bill_view = document.getElementById('bill-view');
    var plans = document.getElementsByName('plan[]');
    var fee = document.getElementById('contract-fee');
    var plan_cost = 0;
    // console.log(plans)
    for(let plan of plans){
      plan.addEventListener('change', function () {
        if(plan.checked == true){
          plan_cost += Number(plan.id);
        }else if(plan.checked == false){
          plan_cost -= Number(plan.id);
        }
        bill_view.innerHTML = "¥" + plan_cost;
        bill.value = plan_cost
      });
    }
    fee.addEventListener('input', function adjust(){
      sum = plan_cost + Number(fee.value);
      bill_view.innerHTML = "¥"+ sum;
      bill.value=sum;
    });
  });
</script>

@endsection