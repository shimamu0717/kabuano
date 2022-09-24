@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container" style="height: auto;">
    <div class="row align-items-center">
      <div class="col-lg-5 col-md-6 col-sm-8 ml-auto mr-auto">
        <form class="form" method="POST" action="{{ route('password.update') }}">
          @csrf

          <input type="hidden" name="token" value="{{ $token }}">
          <input type="hidden" name="email" value="{{ $email }}">
          <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-primary text-center">
              <h4 class="card-title"><strong>新しいパスワードを設定</strong></h4>
            </div>
            <div class="card-body ">
              <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
                </div>
                @if ($errors->has('password'))
                  <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                    <strong>{{ $errors->first('password') }}</strong>
                  </div>
                @endif
              </div>
              <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password(確認用)...') }}" required>
                </div>
                @if ($errors->has('password_confirmation'))
                  <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </div>
                @endif
              </div>
            </div>
            <div class="card-footer justify-content-center">
              <button type="submit" class="btn btn-primary btn-lg">送信</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
