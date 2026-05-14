<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'username'  => ['nullable', 'string', 'max:255', Rule::unique(User::class)->ignore($this->user()->user_id, 'user_id')],
            'email'     => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->user_id, 'user_id')],
            'bio'       => ['nullable', 'string', 'max:500'],
            'foto_user' => ['nullable', 'image', 'max:2048'],
        ];
    }
}