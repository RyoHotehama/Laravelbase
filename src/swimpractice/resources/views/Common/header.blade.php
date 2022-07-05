<div class = "row">
  <div class = "col-6">
    <a href = "{{ route('top') }}">
      <p class = "text-white textSet">表紙</p>
    </a>
  </div>
  <div class = "col-6">
    @if (!empty(Auth::user()))
    <a href = "{{ route('logout') }}">
      <p class = "text-white textSet">ログアウト</p>
    </a>
    @else
    <a href = "{{ route('register') }}">
      <p class = "text-white textSet">新規会員登録</p>
    </a>
    @endif
  </div>
</div>