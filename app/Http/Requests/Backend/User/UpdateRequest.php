<?php

namespace App\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\StrongPassword;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $r): array
    {
        $id = encryptor('decrypt', $r->uptoken);
        return [ 
            'userName_en' => 'required',
            'contactNumber_en' => 'required|unique:users,contact_en,' . $id,
            'emailAddress' => 'required|unique:users,email,' . $id,
            'password' => ['nullable', new StrongPassword],
            // Thêm 'nullable' để cho phép bỏ qua kiểm tra mật khẩu nếu không có mật khẩu mới được cung cấp
        ];
    }
}
