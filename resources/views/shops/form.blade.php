<link rel="stylesheet" href="{{ asset('css/shops/form.css') }}">

<body>
@extends('layout')
@section('content')
  <div class="section">
    <div class="header-title">投稿</div>
    <form action="/shops" method="POST" enctype="multipart/form-data">
    @csrf
      @if ($errors->has('name'))
        <div class="error-message">
          {{ $errors->first('name') }}
        </div>
      @endif
      <div class="form-title">店舗名</div>
      <input type="text" name="name" class="form" value="{{old('name')}}">

      <div class="form-title">画像</div>
      @if ($errors->has('image_url'))
        <div class="error-message">
          {{ $errors->first('image_url') }}
        </div>
      @endif
      <input type="file" name="image_url" class="form" value="{{old('image_url')}}">
      <div class="note">※正しく投稿できなかった場合、再度画像の入力してください</div>

     
      <div class="form-title">場所</div>
      @if ($errors->has('location'))
        <div class="error-message">
          {{ $errors->first('location') }}
        </div>
      @endif
      <input type="text" name="location" class="form" value="{{old('location')}}">

      
      <div class="form-title">値段帯</div>
      @if ($errors)
        <div class="error-message">
          {{ $errors->first('price') }}
        </div>
        <select name="price" class="form">
        <option value="{{ old('price') }}" selected>{{ old('price') }}</option>
          @if (old('price') == "〜1000円") {
          } @else { <option value="〜1000円">〜1000円</option> }
          @endif
          @if (old('price') == "1000~3000円") {
          } @else { <option value="1000~3000円">1000~3000円</option> }
          @endif
          @if (old('price') == "5000円〜") {
          } @else { <option value="5000円〜">5000円〜</option> }
          @endif
          @if (old('price') == "10000円〜") {
          } @else { <option value="10000円〜">10000円〜</option> }
          @endif
        </select>
      @else
        <select name="price" class="form">
          <option value=""></option>
          <option value="〜1000円">〜1000円</option>
          <option value="1000〜3000円">1000〜3000円</option>
          <option value="5000円〜">5000円〜</option>
          <option value="10000円〜">10000円〜</option>
        </select>
      @endif
      
      <div class="form-title">感想</div>
      @if ($errors->has('body'))
        <div class="error-message">
          {{ $errors->first('body') }}
        </div>
      @endif
      <textarea name="body" class="form" cols="30" rows="5">{{old('body')}}</textarea>
      <button type="submit" class="submit">投稿</button>
    </form>
  </div>
@endsection
</body>
</html>