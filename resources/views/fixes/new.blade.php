@extends('layouts.app')

@section('content')

<div class="sidebar">
  <ul>
    <li><a href="{{asset('#')}}"><img src="{{asset('/dashboard-icon.png')}}" alt="">　ダッシュボード</a></li>
    <li><a href="{{asset('/')}}"><img src="{{asset('/sales-icon.png')}}" alt="">　販売管理</a></li>
    <li class="active"><a href="{{asset('/fix/new')}}"><img src="{{asset('/fixes-icon.png')}}" alt="">　修理記録</a></li>
    <li class="active"><a href="{{asset('/fix')}}"><img src="{{asset('/fixes-icon.png')}}" alt="">　修理一覧</a></li>
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
        <h3>修理登録</h3>
        <p>*は必須入力</p>
      </div>
      <div class="white-box">
        <form action="{{route('fix.create')}}" method="post" class="form">
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
              <label for="">修理日*</label>
              <input type="date" name="fix-date" id="" value="{{$today}}" class="form-control">
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">来客者名*</label>
              <input type="text" class="form-control" name="customer-name" placeholder="例) 田中太郎" list="customerList" autocomplete="off">
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">年齢</label>
              <select name="years" id="" class="form-control">
                <option value="">選択してください</option>
                <option value="1">10代</option>
                <option value="2">20代</option>
                <option value="3">30代</option>
                <option value="4">40代</option>
                <option value="5">50代</option>
                <option value="6">60代</option>
                <option value="7">70代</option>
                <option value="8">不明</option>
              </select>
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">性別</label>
              <select name="sex" id="" class="form-control">
                <option value="">選択してください</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">不明</option>
              </select>
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">来店きっかけ</label>
              <select name="reception-style" id="" class="form-control">
                <option value="">選択してください</option>
                <option value="1">電話予約</option>
                <option value="2">メール予約</option>
                <option value="3">飛び込み</option>
                <option value="4">紹介</option>
                <option value="5">リピーター</option>
              </select>
            </div>
            <div class="form-group col-5 py-2">
              <label for="">メーカー*</label>
              <select name="maker" id="maker" class="form-control">
                <option value="">選択してください</option>
                @foreach($makers as $m)
                <option value="{{$m['id']}}">{{$m['name']}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-5 py-2">
              <label for="">受付担当*</label>
              <div class="">
                <input type="hidden" value="" name="reception-user">
                @foreach($user as $u)
                <input type="radio" value="{{$u['id']}}" name="reception-user" id="">
                <span>{{$u['name']}}</span>
                @endforeach
              </div>
            </div>
            <div class="form-group col-5 py-2">
              <label for="">機種名*</label>
              <select name="device_id" id="device" class="form-control">
                <option value="">選択してください</option>
                @foreach($devices as $d)
                <option value="{{$d['id']}}">{{$d['device-name']}}</option>
                @endforeach
              </select>
              <!-- <div class="">
                <input type="text" class="form-control" name="device-model" placeholder="例)iPhone13">
              </div> -->
            </div>
            <div class="form-group col-5 py-2">
              <label for="" id="receptionBtn">受付内容*</label>
              <select name="reception[]" id="reception" class="form-control">
                <option value="">選択してください</option>
                @foreach($receptions as $r)
                <option value="{{$r['id']}}">{{$r['name']}}</option>
                @endforeach
              </select>
              <input type="button" class="btn btn-primary mt-2 text-end d-block" id="" value="+" onclick="addReception()">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">シリアルナンバー</label>
              <input type="text" class="form-control" name="serial-num" placeholder="入力してください">
            </div>
            <div class="form-group col-5 py-2">
              <label for="">修理担当*</label>
              <div class="">
                <input type="hidden" value="" name="fix-user">
                @foreach($user as $u)
                <input type="radio" value="{{$u['id']}}" name="fix-user" id="">
                <span>{{$u['name']}}</span>
                @endforeach
              </div>
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="" id="fixBtn">修理内容*</label>
              <select name="fix-details[]" id="fix-details" class="form-control">
                <option value="">選択してください</option>
                @foreach($fix_details as $f)
                <option value="{{$f['id']}}">{{$f['name']}}</option>
                @endforeach
              </select>
              <input type="button" class="btn btn-primary mt-2 text-end d-block" value="+" onclick="addFix()">
            </div>
            <div class="form-group col-5 py-2">
              <label for="" id="stockBtn">修理部材</label>
              <!-- <input type="text" class="form-control" name="test" placeholder="プルダウンにない場合は、入力してください"> -->
              <select name="stock[]" id="stock" class="form-control">
                <option value="">選択してください</option>
                @foreach($parts as $p)
                <option value="{{$p['id']}}">仕入れ日{{$p['supply-date']->format('Y/m/d')}} - {{$p['device-name']}} - {{$p['name']}} - 残数 {{$p['quantity']}}</option>
                @endforeach
              </select>
              <input type="button" class="btn btn-primary mt-2 text-end d-block" value="+" onclick="addStock()">
            </div>
            <div class="form-group col-11 py-2 border-top mt-3"></div>
            <div class="form-group col-5 py-2">
              <label for="">修理価格合計(税込)*</label>
              <input type="text" class="form-control" name="price" placeholder="入力してください">
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">支払い方法*</label>
              <select name="pay" id="" class="form-control">
                <option value="">選択してください</option>
                <option value="1">現金</option>
                <option value="2">クレカ</option>
                <option value="3">振り込み</option>
              </select>
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">内業務委託費(税込)</label>
              <input type="text" class="form-control" name="commission" placeholder="入力してください">
            </div>
            <div class="form-group col-5 py-2"></div>
            <div class="form-group col-5 py-2">
              <label for="">備考</label>
              <textarea name="remarks" id="" cols="30" rows="5" class="form-control" placeholder="入力してください"></textarea>
            </div>
            <div class="form-group col-5 py-2"></div>
            <!-- <div class="form-group col-5 py-2"></div> -->
          </div>
          <div class="pb-4"><button class="btn btn-success mx-auto d-block" name="">保存する</button></div>
        </form>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
<script>
  function addReception(){
    const receptionBtn = document.getElementById('receptionBtn');
    var newReceptionSelect = document.createElement("select");
    newReceptionSelect.className = "form-control mb-2";
    newReceptionSelect.name = "reception[]";
    newReceptionSelect.id = "reception";
    var newReceptionOption = document.createElement('option');
    newReceptionOption.text = "選択してください";
    newReceptionOption.value = null;
    newReceptionSelect.appendChild(newReceptionOption);
    const receptions = JSON.parse('{!! json_encode($receptions) !!}');
    var r = 0;
    for(var r=0; r < receptions.length; r++){
      var newReceptionOption = document.createElement('option');
      newReceptionOption.value = receptions[r].id;
      newReceptionOption.text = receptions[r].name;
      newReceptionSelect.appendChild(newReceptionOption);
    }
    receptionBtn.after(newReceptionSelect);
    r++ ;
  }
  function addFix(){
    const fixBtn = document.getElementById('fixBtn');
    var newFixSelect = document.createElement("select");
    newFixSelect.className = "form-control mb-2";
    newFixSelect.name = "fix-details[]";
    newFixSelect.id = "fix-details";
    var newFixOption = document.createElement('option');
    newFixOption.text = "選択してください";
    newFixOption.value = null;
    newFixSelect.appendChild(newFixOption);
    const fixes = JSON.parse('{!! json_encode($fix_details) !!}');
    var f = 0;
    for(var f=0; f < fixes.length; f++){
      var newFixOption = document.createElement('option');
      newFixOption.value = fixes[f].id;
      newFixOption.text = fixes[f].name;
      newFixSelect.appendChild(newFixOption);
    }
    fixBtn.after(newFixSelect);
    f++ ;
  }
  function addStock(){
    const stockBtn = document.getElementById('stockBtn');
    var newStockSelect = document.createElement("select");
    newStockSelect.className = "form-control mb-2";
    newStockSelect.name = "stock[]";
    newStockSelect.id = "stock";
    var newStockOption = document.createElement('option');
    newStockOption.text = "選択してください";
    newStockOption.value = null;
    newStockSelect.appendChild(newStockOption);
    const parts = JSON.parse('{!! json_encode($parts) !!}');
    var p = 0;
    for(var p=0; p < parts.length; p++){
      var newStockOption = document.createElement('option');
      newStockOption.value = parts[p].id;
      newStockOption.text = "仕入れ日"+ parts[p]['supply-date'].slice( 0, 10 ) +" - "+ parts[p]['device-name'] +" - "+ parts[p].name +" 残数 " + parts[p].quantity;
      newStockSelect.appendChild(newStockOption);
    }
    stockBtn.after(newStockSelect);
    p++ ;
  }
</script>