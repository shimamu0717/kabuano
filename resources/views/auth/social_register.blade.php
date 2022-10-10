@extends('layouts.app')
@section('title', 'ユーザー登録')

@section('content')
<div class="content pt-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
        <form class="form" method="POST" action="{{ route('register.{provider}',['provider' => $provider]) }}">
          @csrf

          <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-primary text-center">
              <h4 class="card-title"><strong>ユーザー登録</strong></h4>
            </div>
            <div class="card-body">
              <input type="hidden" name="token" value="{{ $token }}">
              <div class="bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" name="name" class="form-control" placeholder="{{ __('name...') }}" value="{{ old('name') }}" required>
                </div>
              </div>
              <div class="bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">email</i>
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control" value="{{ $email }}" disabled>
                </div>
              </div>
            </div>
            <div class="card-footer justify-content-center">
              <button type="submit" class="btn btn-primary btn-lg">ユーザー登録</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
