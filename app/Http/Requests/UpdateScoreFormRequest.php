<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateScoreFormRequest extends Request
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
            'home_score' => 'required|min:0|numeric',
            'visitor_score' => 'required|min:0|numeric'
        ];
    }
}
