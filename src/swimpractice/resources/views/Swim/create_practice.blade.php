@extends('Layouts.base')

@section('title', '練習ページ(水泳)トップ')

@section('content')
<div>
  <div>
    <h1>水泳練習メニュー作成</h1>
  </div>
  @if (count($errors) > 0)
  <div>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div>
    <form action = "" method = "post">
      @csrf
      <div>日付</div>
      <div>
        <input type = "date" name = "date" value = "{{old('date')}}">
      </div>
      <table>
        <tr>
        <th>距離</th>
        <th></th>
        <th>本数</th>
        <th></th>
        <th>セット数</th>
        <th>サイクル</th>
        <th>備考</th>
        </tr>
        <tr>
          <td>
            <input type = "number" name = "distance" min = "25" step = "25" value = "{{old('distance')}}">
          </td>
          <td>✖️</td>
          <td><input type = "number" name = "number" min = "1" value = "{{old('number')}}"></td>
          <td>✖️</td>
          <td><input type = "number" name = "set" min = "1" value = "{{old('set')}}"></td>
          <td><input type = "time" name = "time" value = "{{old('time')}}"></td>
          <td><input type = "text" name = "body" value = "{{old('body')}}"></td>
        </tr>
      </table>
      <div>
        <button>登録</button>
      </div>
    </form>
  </div>
</div>
@endsection