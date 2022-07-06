<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Swim;

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
        // クエリーの取得
        $date = $request->query();
        // バリデーション
        $rule = ['date' => 'required'];
        $message = ['date.required' => '日付が入力されていません。'];
        $data = [];
        if (!empty($date)) {
            $validator = Validator::make($date, $rule, $message);
            if ($validator->fails()) {
                return redirect('/diary')->withErrors($validator)->withInput();
            }
             // データの取得
            $data = Swim::where('date', $date)->get();
        }

        return view('Diary.create', ['data' => $data]);
    }

    public function register(Request $request)
    {
        return view('Diary.create');
    }
}
