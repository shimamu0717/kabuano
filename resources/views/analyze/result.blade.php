@extends('layouts.app')
@section('title', '分析結果')

@section('content')
<div class="container">
  <div class="row align-items-center">
    <div class="col-lg-6 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('analyze.store') }}">
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
              <div class="col-3">
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
                  <p>{{ session('start_open_or_close') === 'open' ? '始値' : '終値'}}</p>
                </div>
                <div class="col-4">
                  <h3>{{ session('start_price') }}円</h3>
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
                  <p>{{ session('end_open_or_close') === 'open' ? '始値' : '終値'}}</p>
                </div>
                <div class="col-4">
                  <h3>{{ session('end_price') }}円</h3>
                </div>
              </div>
            </div>
            <div class="row justify-content-center mt-2">
              <div class="col-4">
                <h3>{{ session('yield')}}（{{ session('yield_ratio')}}％）</h3>
              </div>
              <div class="col-3">
                <div><p>高値{{ session('high') }}円</p></div>
                <div><p>安値{{ session('low') }}円</p></div>
              </div>
            </div>

            <div class="bmd-form-group pt-1">
                <label id="comment">
                    コメント
                </label>
                <p>{{ session('comment') }}</p>
            </div>
            <div class="card-footer justify-content-center">
              <button type="submit" class="btn btn-info btn-lg">{{ __('分析開始') }}</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
