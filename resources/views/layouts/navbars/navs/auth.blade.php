<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">

    <div class="collapse navbar-collapse justify-content-end bg-white" >

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="">
              使い方
          </a>
        </li>

        @auth()
        <li class="nav-item">
          <a class="nav-link" href="">
              マイページ
          </a>
        </li>
        @endauth

        @guest()
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register')}}">
              新規登録
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">
              ログイン
          </a>
        </li>
        @endguest

        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="">{{ __('プロフィール変更') }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('ログアウト') }}</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
