<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRegistroRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:45',
            'github' => 'required',
            'telefono' => 'required'
            /*'nombre' => 'required|min:5|max:45',
            'github' => 'required|unique:registro,github',
            'telefono' => 'required|unique:registro,telefono'*/
        ];
    }
}
