<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomType extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'         => ['required'],
            'base_price'   => ['required', 'numeric'],
            'description'  => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom de la catégorie est obligatoire',
            'base.required' => 'Le prix de base est obligatoire',
            'base.integer'  => 'Le prix de base doit être un entier',
        ];
    }
}
