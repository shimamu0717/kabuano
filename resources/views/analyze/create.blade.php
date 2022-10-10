@extends('layouts.app')
@section('title', '新規分析')

@section('content')
<div class="content pt-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-6 col-sm-8 ml-auto mr-auto">
        <form class="form">
          @csrf

          <div class="card card-hidden mb-3">
            <div class="card-header card-header-info text-center">
              <h4 class="card-title"><strong>新規分析</strong></h4>
            </div>
            <div class="card-body">
              @if (session()->has('no_data'))
                <div id="no_data" class="error text-danger mt-2 mb-3" style="display: block;">
                      <strong>{{ session('no_data') }}</strong>
                </div>
              @endif
              <div class="row bmd-form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                <div class="input-group col-4">
                  <div class="input-group">
                    <label id="code">
                        銘柄コード
                    </label>
                  </div>
                  <input type="text" inputmode="numeric" name="code" id="code" class="form-control" placeholder="{{ __('code...') }}" value="{{ old('code') }}" required>
                </div>
                <div class="input-group col-8">
                  <div class="input-group">
                    <label id="company">
                        銘柄名
                    </label>
                  </div>
                  <input type="text" name="company" id="company" class="form-control" placeholder="{{ __('company...') }}" value="{{ old('company') }}" >
                </div>

                @if ($errors->has('code'))
                  <div id="code-error" class="error text-danger pl-3" for="code" style="display: block;">
                    <strong>{{ $errors->first('code') }}</strong>
                  </div>
                @endif
              </div>
              <div class="row pt-4">
                <div class="col bmd-form-group{{ $errors->has('start_date') ? ' has-danger' : '' }}">
                  <div class="input-group">
                    <div class="input-group">
                      <label id="date">
                          開始日
                      </label>
                    </div>
                    <input type="date" max="{{  date('Y-m-d') }}" name="start_date" id="start_date" class="form-control" placeholder="{{ __('20220101...') }}" value="{{ old('start_date') }}" required>

                  </div>
                  @if ($errors->has('start_date'))
                    <div id="start_date-error" class="error text-danger pl-3" for="start_date" style="display: block;">
                      <strong>{{ $errors->first('start_date') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="col align-self-end offset-1">
                  <div class="form-check form-check-radio form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="start_open_or_close" id="start_open_or_close" value="Open" checked>
                      始値
                      <span class="circle">
                          <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check form-check-radio form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="start_open_or_close" id="start_open_or_close" value="Close">
                      終値
                      <span class="circle">
                          <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row pt-4">
                <div class="col bmd-form-group{{ $errors->has('end_date') ? ' has-danger' : '' }}">
                  <div class="input-group">
                    <div class="input-group">
                      <label id="end_date">
                          終了日
                      </label>
                    </div>
                    <input type="date"  max="{{  date('Y-m-d') }}" name="end_date" id="end_date" class="form-control" placeholder="{{ __('end_date...') }}" value="{{ old('end_date') }}" required>
                  </div>
                  @if ($errors->has('end_date'))
                    <div id="end_date-error" class="error text-danger pl-3" for="end_date" style="display: block;">
                      <strong>{{ $errors->first('end_date') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="col align-self-end offset-1">
                  <div class="form-check form-check-radio form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="end_open_or_close" id="end_open_or_close" value="Open" checked>
                      始値
                      <span class="circle">
                          <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check form-check-radio form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="end_open_or_close" id="end_open_or_close" value="Close">
                      終値
                      <span class="circle">
                          <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="bmd-form-group pt-4">
                <div class="input-group">
                  <label id="comment">
                      コメント
                  </label>
                </div>
                <textarea  rows="4" name="comment" id="comment" class="form-control" value="{{ old('comment') }}"></textarea>
              </div>
              <div class="card-footer justify-content-center">
                <button type="submit" formmethod="POST" formaction="{{ route('analyze.start') }}" class="btn btn-info btn-lg mr-4">{{ __('分析開始') }}</button>
                <a href="{{ route('home') }}" class="btn btn-outline-info btn-lg ml-4">{{ __('キャンセル') }}</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
