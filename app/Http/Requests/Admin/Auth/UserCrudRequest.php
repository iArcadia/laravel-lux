<?php

namespace App\Http\Requests\Admin\Auth;

use App\Models\Auth\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function backpack_auth;

class UserCrudRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array {
        $id = request()->id ?? null;

        return [
            'name' => 'required|min:3|max:30',
            'email' => [
                'required', 'email',
                Rule::unique((new User)->getTable(), 'email')->ignore($id)
            ],
            'password' => 'required|min:5|max:30|confirmed',
            'email_verified_at' => 'required|datetime'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes(): array {
        return [];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array {
        return [];
    }
}
