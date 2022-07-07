<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Swim;
use App\Models\Diary;
use Carbon\Carbon;

class DiaryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function view(Request $request)
    {
        // 本日の日付を取得
        $today = Carbon::now()->toDateString();
        // クエリーの取得
        $date = $request->query();
        // バリデーション
        $rule = ['date' => 'required'];
        $message = ['date.required' => '日付が入力されていません。'];
        $data = [];
        $diary =[];
        if (!empty($date)) {
            $validator = Validator::make($date, $rule, $message);
            if ($validator->fails()) {
                return redirect('/diary')->withErrors($validator)->withInput();
            }
             // データの取得
            $data = Swim::where('date', $date)->get();
            $diary = Diary::where('practice_date', $date)->first();

            $date = $date['date'];
        }

        return view('Diary.create', ['data' => $data, 'today' => $today, 'date' => $date, 'diary' => $diary]);
    }

    public function register(Request $request)
    {
        // バリデーション
        $this->validate($request, Diary::$rules, Diary::$messages);
        // データの登録
        $diary = new Diary;
        $form = $request->all();
        unset($form['_token']);
        $diary->fill($form)->save();

        return view('Diary.create');
    }
}
