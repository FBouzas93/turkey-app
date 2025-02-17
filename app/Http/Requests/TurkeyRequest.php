<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurkeyRequest extends FormRequest
{
    public function rules() {
        return [
            'name' => 'required',
            'status' => 'required',
            'weight' => 'required|numeric|between:5,15',
            'birthdate' => 'required|date',
            'ability_id' => 'required|exists:abilities,id',
        ];
    }
}
