@extends('layouts.app')

@section('content')
<link href="/css/selmodal.css" rel="stylesheet">
<div class="sidebar">
  <ul>
    <li class="active"><a href="#"><img src="/dashboard-icon.png" alt="">　ダッシュボード</a></li>
    <li class="active"><a href="/sales/today"><img src="/sales-icon.png" alt="">　販売管理</a></li>
      <li class="active"><a href="/">　　・記録一覧</a></li>
      <li class="active"><a href="/sales">　　・販売登録</a></li>
    <li><a href="/fix/new"><img src="/fixes-icon.png" alt="">　修理管理</a></li>
    <li><a href="/stock"><img src="/stocks-icon.png" alt="">　在庫管理</a></li>
    <li><a href="/supply/parts"><img src="/parts-icon.png" alt="">　部材管理</a></li>
    <li><a href="/proceeds"><img src="/proceeds-icon.png" alt="">　集計管理</a></li>
    <li><a href="/shop"><img src="/shops-icon.png" alt="">　店舗情報</a></li>
  </ul> 
</div>
<div class="main_content">
<div class="d-flex justify-content-center">
    <div class="main-box py-5">
      <div class="d-flex justify-content-between mb-2">
        <h3>テスト用画面</h3>
        <p></p>
      </div>
      <div class="white-box">
        <form action="/test/create" method="POST">
        @csrf
          <label for="stage"></label>
          <input id="stage_input" list="search_stages" class="" name="" value="" data-id="">
          <datalist id="search_stages">
            <option value="name1" data-id="id1"></option>
            <option value="name2" data-id="id2"></option>
            <option value="name3" data-id="id3"></option>
          </datalist>
          <input id="stage" type="hidden" name="stage" value="">
          <button class="primary">送信</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

<script>
  window.addEventListener('load', function(){
// datalistのdata-id属性の値の取得
  var id = document.getElementById("stage_input");
  var hidden = document.getElementById('stage');
  id.addEventListener('input',function(){
    hidden.value = id.dataset.id
  })
})


// $('#stage_input').on('change', function () {
//   id = $("#search_stages option[value='" + $(this).val() + "']").data('id');
// });
// // submit
// $('#sub_btn').click(function () {
//   $('#stage').val(id);
//   $('#search_form').submit();
// });
</script>
