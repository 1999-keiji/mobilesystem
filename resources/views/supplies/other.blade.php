@extends('layouts.app')

@section('content')

<div class="sidebar">
<ul>
    <li><a href="{{asset('#')}}"><img src="{{asset('/dashboard-icon.png')}}" alt="">　ダッシュボード</a></li>
    <li><a href="{{asset('/')}}"><img src="{{asset('/sales-icon.png')}}" alt="">　販売管理</a></li>
    <li><a href="{{asset('/fix/new')}}"><img src="{{asset('/fixes-icon.png')}}" alt="">　修理管理</a></li>
    <li><a href="{{asset('/stock')}}"><img src="{{asset('/stocks-icon.png')}}" alt="">　在庫管理</a></li>
    <li class="active"><a href="{{asset('/supply/parts')}}"><img src="{{asset('/parts-icon.png')}}" alt="">　部材仕入</a></li>
      <li class="active"><a href="{{asset('/supply/parts')}}">　　・修理パーツ</a></li>
      <li class="active"><a href="{{asset('/supply/phone')}}">　　・端末買取</a></li>
      <li class="active"><a href="{{asset('/supply/other')}}">　　・その他</a></li>
    <li><a href="{{asset('/proceeds')}}"><img src="{{asset('/proceeds-icon.png')}}" alt="">　集計管理</a></li>
    <li><a href="{{asset('/shop')}}"><img src="{{asset('/shops-icon.png')}}" alt="">　店舗情報</a></li>
  </ul> 
</div>
<div class="main_content">
  <div class="d-flex justify-content-center">
    <div class="main-box py-5">
      <div class="d-flex justify-content-between mb-2">
        <h3>その他</h3>
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
              <label for="">仕入れカテゴリー*</label>
              <select name="category" id="category" class="form-control">
                <option value="">選択してください</option>
                <!-- <option value="3">中古端末(スマホ系以外)</option> -->
                <option value="4">アクセサリー</option>
                <option value="5">サービス</option>
                <option value="6">消耗品</option>
                <option value="7">その他</option>
              </select>
            </div>
            <div class="form-group col-5 py-2">
              <label for="">登録担当者*</label>
              <div class="">
              @foreach($user as $u)
                <input type="radio" value="{{$u['id']}}" name="confirmation-user" id="">
                <span>{{$u['name']}}</span>
                @endforeach
              </div>
            </div>
            <div class="form-group col-5 py-2">
              <label for="">仕入れ日*</label>
              <input type="date" id="supply-date" name="supply-date" class="form-control" value="{{$today}}" min="" max="">
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">来客名</label>
              <input type="text" name="customer" id="" class="form-control" placeholder="プルダウンにない場合は、手入力してください">
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">メーカー</label>
              <input type="text" name="maker" class="form-control" id="maker" value="" placeholder="プルダウンにない場合は、手入力してください">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">カラー</label>
              <input type="text" name="color" class="form-control" id="color" value="" placeholder="プルダウンにない場合は、手入力してください">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">機種名</label>
              <select name="device_id" id="" class="form-control">
                <option value="">選択してください</option>
                @foreach($devices as $d)
                <option value="{{$d['id']}}">{{$d['device-name']}}</option>
                @endforeach
              </select>
              <!-- <input type="text" name="type" class="form-control" id="device_id" value="" placeholder="プルダウンにない場合は、手入力してください"> -->
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">商品内容*</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="プルダウンにない場合は、手入力してください">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">シリアルナンバー</label>
              <input type="text" name="serial-number" class="form-control" id="serial-number" value="" placeholder="プルダウンにない場合は、手入力してください">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">ランク</label>
              <select name="rank" id="rank" class="form-control">
                <option value="">選択してください</option>
                <option value="S">S+ランク 未開封</option>
                <option value="S">Sランク 新品、未使用品</option>
                <option value="A">Aランク 未使用に近い</option>
                <option value="B">Bランク目立った傷、汚れなし</option>
                <option value="C">Cランク やや傷、汚れあり</option>
                <option value="D">Dランク 傷、汚れあり</option>
                <option value="J">Jランク ジャンク</option>
              </select>
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">仕入れ先</label>
              <input type="text" name="supplier" class="form-control" id="supplier" value="" placeholder="プルダウンにない場合は、手入力してください">
            </div>
            <div class="col-5 form-group py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">仕入れ価格(税込)*</label>
              <input type="text" name="supply-price" class="form-control" id="supply-price" value="" placeholder="半角数字で入力してください">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">仕入れ個数*</label>
              <input type="text" name="supply-stock" class="form-control" id="supply-stock" value="" placeholder="半角数字で入力してください">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">備考</label>
              <textarea name="remarks" class="form-control" id="" cols="30" rows="5" placeholder="備考を入力してください"></textarea>
            </div>
            <div class="form-group col-5 py-2"><input type="hidden" name="minimum-stock"></div>
          </div>
          <div class="pb-4"><button class="btn btn-success mx-auto d-block">保存する</button></div>
        </form>
      </div>
    </div>
  </div>
  
</div>

@endsection