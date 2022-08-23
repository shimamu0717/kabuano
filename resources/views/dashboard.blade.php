@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">kabuanoとは</h3>
      </div>
      <div class="card-body text-center">
        <h4 class="card-title">kabuanoは株価分析アプリです。</h4>
        <p class="card-text">
          あの時あの株を買っとけばいくらになってたのだろう？
          そう思ったときにカンタンに株価を調べられるアプリです。
        </p>
        <a href="" class="btn btn-lg btn-warning">分析開始</a>
      </div>
    </div>
  </div>
@endsection
