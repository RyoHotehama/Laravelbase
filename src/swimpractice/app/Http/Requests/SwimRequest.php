<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SwimRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'swim/practice') {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|after_or_equal:today',
            'distance' => 'required|integer',
            'number' => 'required|integer',
            'set' => 'required|integer',
            'time' => 'required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
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
    }
}
