<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserStoreRequest extends FormRequest
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
            'name' => 'string|max:255|required|min:4',
            'email' => 'email|max:255|required',
            'password' => 'string|max:255|required|confirmed|min:8',
            'is_admin' => 'string|max:2|nullable',
            'email_verified_at' => 'date|nullable',
            'profile_photo_url' => 'image|max:10240|nullable',
        ];
    }
}
