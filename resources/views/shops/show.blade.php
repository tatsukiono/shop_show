<link rel="stylesheet" href="{{ asset('css/shops/show.css') }}">
 
<body>
@extends('layout')
@section('content')
  <div class="section">
    <div class="content">
    @if (auth()->user()->id == $shop->user_id)
    <div class="btn-box">
      <form action="/shops/{{ $shop->id }}/edit" method="GET">
        <button type="submit" class="form-btn">編集</button>
      </form>
      
      <form action="/shops/delete/{{ $shop->id }}" method="POST">
      @csrf
        <button type="submit" class="form-btn">削除</button>
      </form>
    </div>
    @endif
    <img src="{{ asset('storage/image/'.$shop->image_url) }}" alt="" class="content-image">
    <div class="content-boxs">
      <div class="content-box">
        <div class="content-title">店舗名</div>
        <div class="content-value">{{ $shop->name }}</div>
      </div>
      <div class="content-box">
        <div class="content-title">値段帯</div>
        <div class="content-value">{{ $shop->price }}</div>
      </div>
      <div class="content-box">
        <div class="content-title">場所</div>
        <div class="content-value">{{ $shop->location }}</div>
      </div>
      <div class="content-title">感想</div>
      <div class="content-text">{{ $shop->body }}</div>
      <div class="card-body">
        <div class="row justify-content-center">
        @if(!$like)
            <div class="col-md-3">
                <form action="{{ $shop->id }}/favorites" method="POST">
                  @csrf
                    <input type="hidden" name="id" value="{{ $shop->id }}">
                    <input type="submit" value="いいね" class="fas btn btn-success">
                </form>
                <div class="like-count">いいね数：　{{ $count }}</div>
            </div>
        @else
            <div class="col-md-3">
                <form action="{{ route('unfavorites', $shop) }}" method="POST">
                  @csrf
                    <input type="submit" value="いいね取り消す" class="fas btn btn-danger">
                </form>
            </div>
            <div class="like-count">いいね数：　{{ $count }}</div>
        @endif
        </div>
      </div>
      <a href="/shops" class="top">一覧ページへ</a>
    </div>
    </div>  
  </div>
@endsection
</body> 
</html>