<link rel="stylesheet" href="{{ asset('css/shops/mypage.css') }}">


<body>
@extends('layout')
@section('content')
<div class="section">
    <div class="header-title">{{ $name }}の投稿</div>
    <div class="scroll-box">
      @foreach ($myshops as $myshop)
      <a href="/shops/{{ $myshop->id }}" class="a">
        <div class="content">
             <img src="{{ asset('storage/image/'.$myshop->image_url) }}" alt="" class="content-image">
            <div class="content-price">{{ $myshop->price }}</div>
            <div class="content-location">{{ $myshop->location }}</div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  <div class="section">
    <div class="header-title">いいねした投稿</div>
    <div class="scroll-box">
      @foreach ($likeshops as $likeshop)
      
      <a href="/shops/{{ $likeshop->id }}" class="a">
        <div class="content">
             <img src="{{ asset('storage/image/'.$likeshop->image_url) }}" alt="" class="content-image">
            <div class="content-price">{{ $likeshop->price }}</div>
            <div class="content-location">{{ $likeshop->location }}</div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
@endsection
</body>
</html>