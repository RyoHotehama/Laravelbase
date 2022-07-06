@extends('Layouts.base')

@section('title', '日誌作成')

@section('content')
<div>
  <div>
    <div>
      <p>日誌</p>
    </div>
    <div>
      <p>日付：2022年7月6日</p>
    </div>
    <div>
      <form action = "" method = "get">
        <div>
          <label>練習日</label>
        </div>
        <div>
          <input type = "date" name = "date" value = "">
        </div>
        <div>
          <button>検索</button>
        </div>
      </form>
    </div>
    @if (!empty($data) && count($data) > 0)
    <div>
      <div>
        <diV>
          <form action = "" method = "post">
            @csrf
            <input type = "hidden" name = "date" value = "">
            <input type = "hidden" name = "practice_date" value = "">
            <div>
              <div>
                <label>タイトル</label>
              </div>
              <div>
                <input type = "text" name = "title" value = "{{old('title')}}">
              </div>
            </div>
            <div>
              <div>
                <label>評価</label>
              </div>
              <div>
                <input type = "number" name = "evaluation" min = "1" max = "5" value = "{{old('evaluation')}}">
              </div>
            </div>
            <div>
              <div>
                <label>内容</label>
              </div>
              <div>
                <input type = "textarea" name = "body" value = "{{old('body')}}">
              </div>
            </div>
          </form>
        </diV>
        <div>
          <div>
            <p>練習メニュー</p>
          </div>
          <div>
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
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection