<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class SwimController extends Controller
{
    public function index()
    {
        return view('Swim.index');
    }

    public function practice()
    {
        return view('Swim.create_practice');
    }

    public function post(Request $request)
    {
        $rules = [
            'date' => 'required|after_or_equal:today',
            'distance' => 'required|integer',
            'number' => 'required|integer',
            'set' => 'required|integer',
            'time' => 'required',
        ];
        $messages = [
            'date.required' => '日付は必ず入力してください。',
            'date.after_or_equal' => '本日以降の日付で入力してください。',
            'distance.required' => '距離が入力されていません。',
            'distance.integer' => '距離の値が不正です。',
            'number.required' => '本数が入力されていません。',
            'number.integer' => '本数の値が不正です。',
            'set.required' => 'セット数が入力されていません。',
            'set.integer' => 'セット数が不正です。',
            'time.required' => 'サイクルが入力されていません。',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('/swim/practice')->withErrors($validator)->withInput();
        }
        return view ('Swim.create_practice');
    }
}
