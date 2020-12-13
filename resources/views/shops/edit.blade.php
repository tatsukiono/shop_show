<link rel="stylesheet" href="{{ asset('css/shops/form.css') }}">

<body>
@extends('layout')
@section('content')
  <div class="section">
    <div class="header-title">編集</div>
    <form action="/shops/update/{{ $shop->price }}" method="POST" enctype="multipart/form-data">
    @csrf
      <input type="hidden" name="id" value="{{ $shop->id }}">
      
      <div class="form-title">店舗名</div>
      @if ($errors->has('name'))
          <div class="error-message">
            {{ $errors->first('name') }}
          </div>
      @endif
      @if (old('name'))
      <input type="text" name="name" class="form" value="{{old('name')}}">
      @elseif ($errors->first('name') == '店舗名は必ず指定してください。')
      <input type="text" name="name" class="form" value="">
      @elseif ($shop->name)
        <input type="text" name="name" class="form" value="{{ $shop->name }}">
      @endif

      
      <div class="form-title">画像</div>
      @if ($errors->has('image_url'))
        <div class="error-message">
          {{ $errors->first('image_url') }}
        </div>
      @endif
      <input type="file" name="image_url" class="form" value="{{ $shop->image_url }}">
      <div class="note">※編集前と同じ画像を投稿する場合も再度入力してください</div>
      

      <div class="form-title">場所</div>
      @if ($errors->has('location'))
        <div class="error-message">
          {{ $errors->first('location') }}
        </div>
      @endif
      @if (old('location'))
      <input type="text" name="location" class="form" value="{{old('location')}}">
      @else
        <input type="text" name="location" class="form" value="{{ $shop->location }}">
      @endif
      

      <div class="form-title">値段帯</div>
      @if (old('price'))
        <select name="price" class="form">
          <option value="{{ old('price') }}" selected>{{ old('price') }}</option>
          @if ($shop->price == "〜1000円") {
          } @else { <option value="〜1000円">〜1000円</option> }
          @endif
          @if ($shop->price == "1000〜3000円") {
          } @else { <option value="1000〜3000円">1000〜3000円</option> }
          @endif
          @if ($shop->price == "5000円〜") {
          } @else { <option value="5000円〜">5000円〜</option> }
          @endif
          @if ($shop->price == "10000円〜") {
          } @else { <option value="10000円〜">10000円〜</option> }
          @endif
        </select>
      @else
        <select name="price" class="form">
        <option value="{{ $shop->price }}" selected>{{ $shop->price }}</option>
        @if ($shop->price == "〜1000円") {
        } @else { <option value="〜1000円">〜1000円</option> }
        @endif
        @if ($shop->price == "1000〜3000円") {
        } @else { <option value="1000〜3000円">1000〜3000円</option> }
        @endif
        @if ($shop->price == "5000円〜") {
        } @else { <option value="5000円〜">5000円〜</option> }
        @endif
        @if ($shop->price == "10000円〜") {
        } @else { <option value="10000円〜">10000円〜</option> }
        @endif
      </select>

      @endif
      

      <div class="form-title">感想</div>
      @if ($errors->has('body'))
        <div class="error-message">
          {{ $errors->first('body') }}
        </div>
      @endif
      @if (old('body'))
      <textarea name="body" class="form" cols="30" rows="5" value="{{old('body')}}">{{old('body')}}</textarea>
      @elseif ($errors->first('body') == '感想は必ず指定してください。')
      <textarea name="body" class="form" cols="30" rows="5" value=""></textarea>
      @elseif ($shop->body)
      <textarea name="body" class="form" cols="30" rows="5" value="{{ $shop->body }}">{{ $shop->body }}</textarea>
      @endif
      
      <button type="submit" class="submit">投稿</button>
    </form>
  </div>
@endsection
</body>
</html>