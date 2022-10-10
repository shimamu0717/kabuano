<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">

  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      kabuano
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('analyze.create') }}">
          <i class="material-icons">content_paste</i>
            <p>新規分析</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('show.all') }}">
          <i class="material-icons">location_ons</i>
            <p>みんなの分析</p>
        </a>
      </li>

      @auth

      <li class="nav-item">
        <a class="nav-link" href="{{ route('favorite') }}">
          <i class="material-icons">library_books</i>
            <p>お気に入り</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">bubble_chart</i>
          <p>マイ分析</p>
        </a>
      </li>
      <li class="nav-item active-pro text-center">
        <button form="logout-form" type="submit" class="btn btn-warning btn-round">
          <i class="material-icons text-white">unarchive</i>
          ログアウト
        </button>
      </li>
      @endauth
    </ul>
  </div>
</div>
