<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'date' => 'required',
        'practice_date' => 'required',
        'title' => 'required|string|max:50',
        'evaluation' => 'required|integer|max:5',
        'body' => 'required|string|',
    );

    public static $messages = array(
        'date.required' => '日付は必ず入力してください。',
        'practice_date.required' => '練習日は必ず入力して下さい。',
        'title.required' => 'タイトルが入力されていません。',
        'title.string' => 'タイトルが不正です。',
        'title.max' => 'タイトルが長すぎます。',
        'evaluation.required' => '評価が入力されていません。',
        'evaluation.integer' => '評価が不正です。',
        'evaluation.max' => '評価が不正です。',
        'body.required' => '内容が入力されていません。',
        'body.string' => '入力した内容が不正です。',
    );
}
