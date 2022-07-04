@extends('Layouts.base')

@section('title', '練習編集ページ')

@section('content')
<div>
  @if (!empty($msg))
  <div>
    <p>{{$msg}}</p>
  </div>
  @endif
  <div>
    <h1>水泳練習メニュー編集</h1>
  </div>
  <div>
    <h3>編集したい日付を選択</h3>
  </div>
  <form action = "" method = "get">
    <div>日付</div>
    @if ($errors->has('date'))
    <div>
      <p>{{$errors->first('date')}}</p>
    </div>
    @endif
    @if (isset($date['date']))
    <input type = "date" name = "date" value = "{{$date['date']}}">
    @else
    <input type = "date" name = "date">
    @endif
    <button>検索</button>
  </form>
  @if (!empty($data) && count($data) > 0)
  <form action = "" method = "post">
    @csrf
      @foreach ($data as $value)
      <input type = "hidden" name = "id" value = "{{$value->id}}">
        @if ($loop->first)
        <div>
          <div>
            <p>日付：<input type = "date" name = "date" value = "{{$value->date}}"></p>
          </div>
          <table>
            <tr>
            <th>距離</th>
            <th></th>
            <th>本数</th>
            <th></th>
            <th>セット数</th>
            <th>サイクル</th>
            <th></th>
            <th>備考</th>
            </tr>
          @endif
            <tr>
              <td>
                <input type = "number" name = "distance" min = "25" step = "25" value = "{{$value->distance}}">
              </td>
              <td>✖️</td>
              <td><input type = "number" name = "number" min = "1" value = "{{$value->number}}"></td>
              <td>✖️</td>
              <td><input type = "number" name = "set" min = "1" value = "{{$value->set}}"></td>
              <td><input type = "number" name = "minutes" min = "0" value = "{{$value->minutes}}">分</td>
              <td><input type = "number" name = "secound" min = "0" value = "{{$value->secound}}">秒</td>
              <td><input type = "text" name = "body" value = "{{$value->body}}"></td>
            </tr>
      @endforeach
        </table>
        <div>
          <button>変更</button>
        </div>
      </div>
  </form>
  @elseif (!empty($data))
  <div>
    <h3>メニューがありません</h3>
  </div>
  @endif
</div>
@endsection