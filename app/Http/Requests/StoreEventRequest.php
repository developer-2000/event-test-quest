<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Здесь можно добавить логику авторизации
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'poster_path' => 'sometimes|image|max:2048',
            'event_date' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
        ];
    }
}
