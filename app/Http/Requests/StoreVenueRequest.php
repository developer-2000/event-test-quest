<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVenueRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Здесь можно добавить логику авторизации
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }
}
