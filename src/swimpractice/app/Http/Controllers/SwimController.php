<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Swim;
use Carbon\Carbon;

class SwimController extends Controller
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
        // 本日の日付を取得
        $today = Carbon::now()->toDateString();
        //１週間後の日付を取得
        $weekday = Carbon::now()->addDay(7)->toDateString();
        // 本日のメニューを取得
        $data = Swim::where('date', $today)->get();
        foreach ($data as $value) {
            // 時間表示の変更
            $value->time = $this->timeChange($value->time);
        }

        // １週間のメニューを取得
        $week_data = Swim::whereRaw('date > ? and date <= ?', [$today, $weekday])->get();
        foreach ($week_data as $value) {
            // 日付表示の変更
            $value->date = date('Y年m月d日', strtotime($value->date));
            // 時間表示の変更
            $value->time = $this->timeChange($value->time);
        }

        return view('Swim.index', ['data' => $data, 'weekData' => $week_data]);
    }

    /**
     * 練習メニュー作成ページ
     * @return void
     */
    public function practice()
    {
        return view('Swim.create_practice');
    }

    /**
     * 練習メニュー登録ページ
     * @param Request $request フォームのデータ
     * @return void
     */
    public function complete(Request $request)
    {
        // バリデーション
        $this->validate($request, Swim::$rules, Swim::$messages);
        // データの登録
        $swim = new Swim;
        $form = $request->all();
        unset($form['_token']);
        $swim->fill($form)->save();

        return view('Swim.complete');
    }

    /**
     * 練習メニュー編集ページ
     * @param Request $request getパラメータ
     * @return void
     */
    public function edit(Request $request)
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
                return redirect('/swim/edit')->withErrors($validator)->withInput();
            }
             // データの取得
            $data = Swim::where('date', $date)->get();
            foreach ($data as $value) {
                // 時間表示の変更
                $value->time = $this->setTime($value);
            }
        }

        return view('Swim.edit', ['data' => $data, 'date' => $date]);
    }

    /**
     * 練習メニュー編集ページ
     * @param Request $request フォームのデータ
     * @return void
     */
    public function update(Request $request) {
        // バリデーション
        $this->validate($request, Swim::$rules, Swim::$messages);
        $swim = Swim::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $swim->fill($form)->save();
        $msg = '更新しました';
        return view('Swim.edit', ['msg' => $msg]);
    }

    /**
     * 時間変更処理
     * @param int $time 時間
     * @return string
     */
    private function timeChange($time)
    {
        $minutes = floor($time / 60);
        $secound = $time % 60;
        $time = $minutes . '分' . $secound . '秒';

        return $time;
    }

    /**
     * 時間セット処理
     * @param array $data 練習データ
     * @return void
     */
    private function setTime($data)
    {
        $data->minutes = floor($data->time / 60);
        $data->secound = $data->time % 60;
    }
}
