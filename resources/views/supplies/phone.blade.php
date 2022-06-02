@extends('layouts.app')

@section('content')

<div class="sidebar">
<ul>
    <li><a href="#"><img src="/dashboard-icon.png" alt="">　ダッシュボード</a></li>
    <li><a href="/"><img src="/sales-icon.png" alt="">　販売管理</a></li>
    <li><a href="/fix/new"><img src="/fixes-icon.png" alt="">　修理管理</a></li>
    <li><a href="/stock"><img src="/stocks-icon.png" alt="">　在庫管理</a></li>
    <li class="active"><a href="/supply/parts"><img src="/parts-icon.png" alt="">　部材仕入</a></li>
      <li class="active"><a href="/supply/parts">　　・修理パーツ</a></li>
      <li class="active"><a href="/supply/phone">　　・端末買取</a></li>
      <li class="active"><a href="/supply/other">　　・その他</a></li>
    <li><a href="/proceeds"><img src="/proceeds-icon.png" alt="">　集計管理</a></li>
    <li><a href="/shop"><img src="/shops-icon.png" alt="">　店舗情報</a></li>
  </ul> 
</div>
<div class="main_content">
  <div class="d-flex justify-content-center">
    <div class="main-box py-5">
      <div class="d-flex justify-content-between mb-2">
        <h3>スマホ、タブレット買取</h3>
        <p>*は必須入力</p>
      </div>
      <div class="white-box">
        <form action="/supply/create" method="post" class="form">
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
              <label for="">買取日*</label>
              <input type="date" id="supply-date" name="supply-date" class="form-control" value="{{$today}}" min="" max="">
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
              <label for="">来客名*</label>
              <input type="text" name="customer" id="" class="form-control" placeholder="プルダウンにない場合は、手入力してください">
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">メーカー</label>
              <select name="maker_id" id="" class="form-control">
                <option value="">選択してください</option>
                @foreach($makers as $m)
                <option value="{{$m['id']}}">{{$m['name']}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">機種名*</label>
              <select name="device_id" id="" class="form-control">
                <option value="">選択してください</option>
                @foreach($devices as $d)
                <option value="{{$d['id']}}">{{$d['device-name']}}</option>
                @endforeach
              </select>
            </div>
            <input type="hidden" name="name" value="端末本体">
            <div class="form-group col-5 py-2">
              <label for="">カラー</label>
              <input type="text" name="color" class="form-control" id="color" value="" placeholder="プルダウンにない場合は、手入力してください">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">シリアルナンバー</label>
              <input type="text" name="serial-number" class="form-control" id="serial-number" value="" placeholder="プルダウンにない場合は、手入力してください">
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">商品ランク</label>
              <select name="rank" id="rank" class="form-control">
                <option value="">選択してください</option>
                <option value="S+">S+ランク 未開封</option>
                <option value="S">Sランク 新品、未使用品</option>
                <option value="A">Aランク 未使用に近い</option>
                <option value="B">Bランク目立った傷、汚れなし</option>
                <option value="C">Cランク やや傷、汚れあり</option>
                <option value="D">Dランク b傷、汚れあり</option>
                <option value="J">Jランク ジャンク</option>
              </select>
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">仕入れ価格(税込)*</label>
              <input type="text" name="supply-price" class="form-control" id="supply-price" value="" placeholder="半角数字で入力してください">
            </div>
            <div class="form-group col-5 py-2">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">備考</label>
              <textarea name="remarks" class="form-control" id="" cols="30" rows="5" placeholder="備考を入力してください"></textarea>
            </div>
            <div class="form-group col-5 py-2"><input type="hidden" name="minimum-stock"></div>
          </div>
          <div class="pb-4"><button class="btn btn-success mx-auto d-block" name="category" value="2">保存する</button></div>
        </form>
      </div>
    </div>
  </div>
  
</div>

@endsection