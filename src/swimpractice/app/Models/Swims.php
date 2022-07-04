<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swims extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'date' => 'required|after_or_equal:today',
        'distance' => 'required|integer',
        'number' => 'required|integer',
        'set' => 'required|integer',
        'time' => 'required',
    );

    public static $messages = array(
        'date.required' => '日付は必ず入力してください。',
        'date.after_or_equal' => '本日以降の日付で入力してください。',
        'distance.required' => '距離が入力されていません。',
        'distance.integer' => '距離の値が不正です。',
        'number.required' => '本数が入力されていません。',
        'number.integer' => '本数の値が不正です。',
        'set.required' => 'セット数が入力されていません。',
        'set.integer' => 'セット数が不正です。',
        'time.required' => 'サイクルが入力されていません。',
    );
}
