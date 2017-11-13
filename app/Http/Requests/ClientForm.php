<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientForm extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'         => ['required'],
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'email'         => ['nullable', 'email'],
            'company'       => ['nullable'],
            'phone'         => ['required'],
            'country'       => ['required'],
            'city'          => ['nullable'],
            'address'       => ['nullable']
        ];
    }

    public function message()
    {
        return [
            'title.required'        => 'Le titre est requis',
            'first_name.required'   => 'le prenom est requis',
            'last_name.required'    => 'Le nom est requis',
            'email.email'           => 'Ceci doit etre un email valable',
            'phone.required'        => 'Le numero de telephone est requis',
            'country.required'      => 'Le pays de residence est requis'
        ];
    }
}
