@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
          @endif
          
          <div class="card">
              <div class="card-header">ログイン</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- <div class="row mb-3">
                          <label for="shop" class="col-md-4 col-form-label text-md-end">店舗名</label>
                          <div class="col-md-6">
                            <select name="shop" id="shop" class="form-control">
                              <option value="">選択してください</option>
                              @foreach($shops as $s)
                              <option value="{{$s['id']}}">{{$s['name']}}</option>
                              @endforeach
                            </select> 
                          </div>
                        </div> -->

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">スタッフ名</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">パスワード</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ログインする
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
