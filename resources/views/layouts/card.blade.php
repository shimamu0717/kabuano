<a class="card mx-1" style="width: 18rem" data-toggle="modal" data-target="#modal-show-{{ $analyze->id }}">
    <div class="card-header card-header-info text-center">
    </div>
    <div class="card-body">
      @include('layouts.detail')
      <div class="bmd-form-group pt-1">
          <label id="comment">
              コメント
          </label>
          <p>{{ $analyze->comment }}</p>
      </div>
    </div>
    <div class="card-footer">
        <Favorite
         :initial-is-favorite-by='@json($analyze->isFavoriteBy(Auth::user()))'
         :authorized='@json(Auth::check())'
         endpoint="{{ route('analyzes.favorite', ['analyze' => $analyze]) }}"
        ></Favorite>
        <div class="">{{ $analyze->created_at->format('Y/m/d') }}</div>
        <div class="">{{ $analyze->user->name }}</div>
    </div>
</a>

@if ( Auth::id() === $analyze->user_id )
<!-- modal -->
<div class="modal fade" id="modal-show-{{ $analyze->id }}" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          &times;
        </button>
      </div>

      <div class="card-body">
        @include('layouts.detail')
        <form class="bmd-form-group pt-1" method="POST">
          <div>
            <label id="comment">
                コメント
            </label>
          </div>
          <textarea  rows="4" name="comment" id="comment" class="form-control">{{ $analyze->comment }}</textarea>
          <div class="text-center">
            @csrf
            <button type="submit"  formmethod="POST" formaction="{{ route('analyze.update', ['analyze' => $analyze]) }}" class="btn btn-info btn-lg mr-4">@method('PATCH'){{ __('更新') }}</button>
            <a data-toggle="modal" data-target="#modal-delete-{{ $analyze->id }}" class="btn btn-outline-info btn-lg ml-4">{{ __('削除') }}</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-delete-{{ $analyze->id }}" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" style="width: 25rem">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
        </button>
      </div>
      <form method="POST" action="{{ route('analyze.destroy', ['analyze' => $analyze]) }}">
        @csrf
        @method('DELETE')
        <div class="modal-body text-center">
          この分析を削除してもよろしいですか？
        </div>
        <div class="modal-footer justify-content-center">
          <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
          <button type="submit" class="btn btn-danger">削除する</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endif
