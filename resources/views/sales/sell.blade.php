@extends('layouts.app')

@section('content')
<link href="/css/selmodal.css" rel="stylesheet">
<div class="sidebar">
  <ul>
    <li><a href="#"><img src="/dashboard-icon.png" alt="">　ダッシュボード</a></li>
    <li class="active"><a href="/"><img src="/sales-icon.png" alt="">　販売管理</a></li>
      <li class="active"><a href="/sale">　　・販売一覧</a></li>
      <li class="active"><a href="/contract">　　・継続契約</a></li>
      <li class="active"><a href="/sell">　　・販売登録</a></li>
    <li><a href="/fix/new"><img src="/fixes-icon.png" alt="">　修理管理</a></li>
    <li><a href="/stock"><img src="/stocks-icon.png" alt="">　在庫管理</a></li>
    <li><a href="/supply/parts"><img src="/parts-icon.png" alt="">　部材仕入</a></li>
    <li><a href="/proceeds"><img src="/proceeds-icon.png" alt="">　集計管理</a></li>
    <li><a href="/shop"><img src="/shops-icon.png" alt="">　店舗情報</a></li>
  </ul> 
</div>
<div class="main_content">
  <div class="d-flex justify-content-center">
    <div class="main-box py-5">
      <div class="d-flex justify-content-between mb-2">
        <h3>販売登録</h3>
        <p></p>
      </div>
      <div class="white-box">
        <form action="{{route('sale.create')}}" method="post" class="form">
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
              <label for="">販売日*</label>
              <input type="date" id="sales-date" name="sales-date" class="form-control" value="{{$today}}" min="" max="">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">登録担当者*</label>
              @foreach($user as $u)
              <div class="">
                <input type="radio" value="{{$u['id']}}" name="register" id="">
                <span>{{$u['name']}}</span>
                <input type="radio" value="{{$u['id']}}" name="register" id="">
                <span>{{$u['name']}}</span>
              </div>
              @endforeach
            </div>
            <div class="form-group col-5 py-2">
              <label for="">商品名(在庫から選択)</label>
              <select name="stock_id" id="" class="form-control selmodaltest">
                <option value="">選択してください</option>
                @foreach($stocks as $s)
                <option value="{{$s['id']}}">
                  登録日:{{$s->created_at->format('Y/m/d')}}<br>
                  機種名:{{$s->type->name?? '---'}}<br>
                  商品名:{{$s->name}}
                </option>
                @endforeach
              </select>
              <a href="/contract/new" class="text-end d-block text-primary">継続契約はこちら</a>
            </div>
            <div class="col-5 form-group py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">集計用販売品目*</label>
              <select class="form-control" name="category_id" id="">
                <option value="">選択してください</option>
                @foreach($categories as $c)
                @if($c['id']!=1)
                @if($c['id']!=3)
                <option value="{{$c['id']}}">{{$c['name']}}</option>
                @endif
                @endif
                @endforeach
              </select> 
            </div>
            <div class="form-group col-5 py-2">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">来客名</label>
              <input type="text" class="form-control" name="customer" list="customerList" placeholder="例) 田中太郎" autocomplete="off">
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">販売価格(税込)*</label>
              <input type="text" name="price" class="form-control" id="price" value="" placeholder="半角数字で入力してください" autocomplete="off">
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">支払い方法</label>
              <select name="pay" class="form-control" id="pay">
                <option value="">選択してください</option>
                @foreach($pay as $p)
                <option value="{{$p['id']}}">{{$p['name']}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-5 form-group py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">備考</label>
              <textarea name="remarks" class="form-control" id="" cols="30" rows="5" placeholder="備考を入力してください"></textarea>
            </div>
            <div class="form-group col-5 py-2"></div>
          </div>
          <div class="pb-4"><button class="btn btn-success mx-auto d-block" name="">保存する</button></div>
        </form>
      </div>
    </div>
  </div>
  
</div>

@endsection

<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js?ver=1.12.4'></script>
<script src="/js/Jquery.selmodal.js"></script>
<script>
$(function(){
    $('.selmodaltest').selModal();
});
</script>