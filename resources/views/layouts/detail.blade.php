<div class="row justify-content-start">
  <div class="col-3">
    <p>{{ $analyze->code }}</p>
  </div>
  <div class="col-9">
    <h3 class="my-1">{{ $analyze->company }}</h3>
  </div>
</div>
<div class="row justify-content-start">
  <div class="col-5">
    <p>{{ $analyze->start_date }}</p>
  </div>
  <div class="col-2 px-0">
    <p>{{ $analyze->start_open_or_close === 'Open' ? '始値' : '終値'}}</p>
  </div>
  <div class="col-5 px-0">
    <h4><b>{{ $analyze->start_price }}</b> 円</h4>
  </div>
</div>
<div class="row justify-content-start">
  <div class="col-5">
    <p>{{ $analyze->end_date }}</p>
  </div>
  <div class="col-2 px-0">
    <p>{{ $analyze->end_open_or_close === 'Open' ? '始値' : '終値'}}</p>
  </div>
  <div class="col-5 px-0">
    <h4><b>{{ $analyze->end_price }}</b> 円</h4>
  </div>
</div>
<div class="row mt-1">
  <div class="col-5">
    <label id="low">期間中高値</label>
  </div>
  <div class="col-7">
    <h4><b>{{ $analyze->high }}</b> 円</h4>
  </div>
</div>
<div class="row">
  <div class="col-5">
    <label id="low">期間中安値</label>
  </div>
  <div class="col-7">
    <h4><b>{{ $analyze->low }}</b> 円</h4>
  </div>
</div>
<div class="row mt-1">
  <div class="col-6">
    <label id="yield">開始日比</label>
    <h3 class="mt-0">{{ $analyze->yield }} 円</h3>
  </div>
  <div class="col-6">
    <label id="yield_ratio">比率</label>
    <h3 class="mt-0">{{ $analyze->yield_ratio }} ％</h3>
  </div>
</div>
