<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OccupationForm extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'client_id' => [ 'required', 'exists:clients,id' ],
            'room_id'   => [ 'required', 'exists:rooms,id' ],
            'agent_id'  => [ 'nullable' ],
            // 'from_date' => [ 'required', 'date', 'after_or_equal:today' ],
            'from_date' => [ 'required', 'date' ],
            'to_date'   => [ 'nullable', 'date', 'after:from_date' ]
        ];
    }
}
