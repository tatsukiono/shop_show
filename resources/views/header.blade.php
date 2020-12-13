<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<div class="header-box">
  <div class="header-box-left">
    <h1 class="shop-show"><a href="/shops" class="text-decoration">shop show</a></h1>
  </div>
  <div class="header-box-right">
        <!-- Authentication Links -->
        @guest
          <ul class="nav-item-ul">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">新規登録</a>
                </li>
          </ul>
            @endif
        @else
          <ul class="header-box-right-ul">
            <li><a href="/shops/create" class="header-box-right-list">投稿</a></li>
            <li><a href="/mypage/{{ auth()->user()->id }}" class="header-box-right-list">マイページ</a></li>
            <li>
              <a class="header-box-right-list" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  ログアウト
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
        @endguest
    </ul>
  </div>
</div>
