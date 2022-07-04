@extends('Layouts.base')

@section('title', '練習ページ(水泳)トップ')

@section('content')
<div>
  <div>
    <a href = "/swim/practice">メニュー作成</a>
  </div>
  <div>
    <a href = "swim/edit">メニュー編集</a>
  </div>
  <div>過去のメニュー</div>
</div>
<div>
  <h2>本日のメニュー</h2>
  @if (count($data) > 0)
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
    @foreach ($data as $value)
    <tr>
      <td>{{$value->distance}}</td>
      <td>✖️</td>
      <td>{{$value->number}}</td>
      <td>✖️</td>
      <td>{{$value->set}}</td>
      <td>{{$value->time}}</td>
      <td>{{$value->body}}</td>
    </tr>
    @endforeach
  </table>
  @else
  <h3>本日のメニューはありません</h3>
  @endif
</div>
<div>
  <h3>明日以降1週間のメニュー</h3>
  @if (count($weekData) > 0)
  <table>
    <tr>
      <th>日付</th>
      <th>距離</th>
      <th></th>
      <th>本数</th>
      <th></th>
      <th>セット数</th>
      <th>サイクル</th>
      <th>備考</th>
    </tr>
    @foreach ($weekData as $value)
    <tr>
      <td>{{$value->date}}</td>
      <td>{{$value->distance}}</td>
      <td>✖️</td>
      <td>{{$value->number}}</td>
      <td>✖️</td>
      <td>{{$value->set}}</td>
      <td>{{$value->time}}</td>
      <td>{{$value->body}}</td>
    </tr>
    @endforeach
  </table>
  @else
  <h3>メニューはありません</h3>
  @endif
</div>
@endsection