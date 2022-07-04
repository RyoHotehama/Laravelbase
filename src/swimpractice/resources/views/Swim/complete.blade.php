@extends('Layouts.base')

@section('title', '練習作成ページ')

@section('content')
<div>
  <div>
    <p>練習メニューを作成しました。</p>
  </div>
  <div>
    <a href = "/swim">練習メニュートップへ</a>
    <a href = "/swim/practice">続けてメニューを作成する</a>
  </div>
</div>
@endsection