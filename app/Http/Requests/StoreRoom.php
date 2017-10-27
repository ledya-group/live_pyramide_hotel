<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoom extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'         => ['required'],
            'room_type_id' => ['required', 'exists:room_types,id'],
            'description'  => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Le nom de la chambre est manquant',
            'room_type_id.required' => 'Choisir une catégorie',
            'room_type_id.exists'   => 'La catégorie doit exister',
        ];
    }
}
