<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateMatchFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   

        return [
            'home_team' => 'required',
            'visitor_team' => 'required|different:home_team',
            'home_win' => 'required|regex:/^(?!0\d)\d*(\.\d+)?$/',
            'visitor_win' => 'required|regex:/^(?!0\d)\d*(\.\d+)?$/',
            'zero_zero' => 'required|regex:/^(?!0\d)\d*(\.\d+)?$/',
            'time_begin' => 'required|after:now',
            'time_end' => 'required|after:time_begin',  

        ];
    }
}
