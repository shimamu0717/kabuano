@extends('layouts.app')
@section('title', '分析結果')

@section('content')
<div class="content">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-6 col-sm-8 ml-auto mr-auto">
        <form class="form">
          @csrf
          <div class="card card-hidden mb-3">
            <div class="card-header card-header-info text-center">
              <h4 class="card-title"><strong>分析結果</strong></h4>
            </div>
            <div class="card-body ">
              <div class="row justify-content-start bmd-form-group">
                <div class="col-3">
                  <label id="code">
                      銘柄コード
                  </label>
                  <p>{{ session('code') }}</p>
                </div>
                <div class="col-9">
                  <h3>{{ session('company') }}</h3>
                </div>
              </div>
              <div class="bmd-form-group">
                <label id="date">
                  開始日
                </label>
                <div class="row">
                  <div class="col-3 align-self-center">
                    <p>{{ session('start_date') }}</p>
                  </div>
                  <div class="col-2 align-self-center">
                    <p>{{ session('start_open_or_close') === 'Open' ? '始値' : '終値'}}</p>
                  </div>
                  <div class="col-4">
                    <h3>{{ session('start_price') }} 円</h3>
                  </div>
                </div>
              </div>
              <div class="bmd-form-group">
                <label id="date">
                  終了日
                </label>
                <div class="row">
                  <div class="col-3 align-self-center">
                    <p>{{ session('end_date') }}</p>
                  </div>
                  <div class="col-2 align-self-center">
                    <p>{{ session('end_open_or_close') === 'Open' ? '始値' : '終値'}}</p>
                  </div>
                  <div class="col-4">
                    <h3>{{ session('end_price') }} 円</h3>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-3"><label id="low">期間中高値</label></div>
                <div class="col-9"><span class="h4">{{ session('high') }}</span> 円</div>
              </div>
              <div class="row">
                <div class="col-3"><label id="low">期間中安値</label></div>
                <div class="col-9"><span class="h4">{{ session('low') }}</span> 円</div>
              </div>
              <div class="row mt-2">
                <div class="col-2"><label id="yield">開始日比</label></div>
                <div class="col-4 h3">{{ session('yield')}}円</div>
                <div class="col-2"><label id="yield_ratio">比率</label></div>
                <div class="col-4 h3">{{ session('yield_ratio')}}％</div>
              </div>
              <div class="row mt-2">


              </div>

              <div class="bmd-form-group pt-1">
                  <label id="comment">
                      コメント
                  </label>
                  <p>{{ session('comment') }}</p>
              </div>
              <div class="card-footer justify-content-center">
                <button type="submit"  formmethod="POST" formaction="{{ route('analyze.store') }}" class="btn btn-info btn-lg mr-4">{{ __('　保存　') }}</button>
                <button type="submit" formmethod="GET" formaction="{{ route('analyze.create') }}" class="btn btn-outline-info btn-lg ml-4">{{ __('キャンセル') }}</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
