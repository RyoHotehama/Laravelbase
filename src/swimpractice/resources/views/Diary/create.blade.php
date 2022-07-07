@extends('Layouts.base')

@section('title', '日誌作成')

@section('content')
<div>
  <div>
    <div>
      <p>日誌</p>
    </div>
    <div>
      <p>日付：{{$today}}</p>
    </div>
    <div>
      <form action = "" method = "get">
        <div>
          <label>練習日</label>
        </div>
        <div>
          <input type = "date" name = "date" value = "{{old('date')}}">
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
            <input type = "hidden" name = "date" value = "{{$today}}">
            <input type = "hidden" name = "practice_date" value = "{{$date}}">
            <div>
              <div>
                <label>タイトル</label>
              </div>
              <div>
                <input type = "text" name = "title" value = "{{old('title')}}">
                @error('title')
                <span>
                  <strong>{{$message}}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div>
              <div>
                <label>評価</label>
              </div>
              <div>
                <input type = "number" name = "evaluation" min = "1" max = "5" value = "{{old('evaluation')}}">
                @error('evaluation')
                <span>
                  <strong>{{$message}}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div>
              <div>
                <label>内容</label>
              </div>
              <div>
                <input type = "textarea" name = "body" value = "{{old('body')}}">
                @error('body')
                <span>
                  <strong>{{$message}}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div>
              <button>登録</button>
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
    @elseif (!empty($diary))
    <!-- todo -->
    @endif
  </div>
</div>
@endsection