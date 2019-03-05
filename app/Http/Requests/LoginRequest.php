<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\LoginUser;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                function ($attribute, $value, $fail) {
                    $numberOfLoginUser = LoginUser::count();
                    // ログインユーザーが2名いる場合はエラーを返す
                    if ($numberOfLoginUser > 2) {
                        return $fail(trans('validation.custom.limit-login'));
                    }
                }
            ]
        ];
    }
}
