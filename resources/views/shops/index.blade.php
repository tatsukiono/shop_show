<link href="css/shops/index.css" rel="stylesheet">

<body>
@extends('layout')
@section('content')
  <div class="section">
    <div class="header-title">投稿一覧</div>
    <div class="scroll-box">
      @foreach ($shops as $shop)
      <a href="/shops/{{ $shop->id }}" class="a">
        <div class="content">
             <img src="{{ asset('storage/image/'.$shop->image_url) }}" alt="" class="content-image">
            <div class="content-price">{{ $shop->price }}</div>
            <div class="content-location">{{ $shop->location }}</div>
        </div>
      </a>
      @endforeach
    </div>
  </div>

@endsection
</body>
</html>