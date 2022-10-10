@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-3">
      <div>
        <h3>{{ $title }}</h3>
      </div>
      <div class="d-flex flex-wrap">
        @foreach ($analyzes as $analyze)
        @include('layouts.card')
        @endforeach
      </div>
    </div>
@endsection
