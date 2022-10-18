<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserUpdateRequest extends FormRequest
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
            'name' => 'string|max:255|min:4',
            'email' => 'email|max:255|',
            'password' => 'string|max:255|confirmed|min:8|nullable',
            'is_admin' => 'nullable',
            'email_verified_at' => 'date|nullable',
            'profile_photo_url' => 'image|max:10240|nullable',
        ];
    }
}
