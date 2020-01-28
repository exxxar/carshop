<?php

namespace AutoKit\Http\Requests;

use AutoKit\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class VinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vincode' => 'required|max:255',
            'year' => 'required',
            'carmake' => 'required',
            'power' => 'required',
            'month' => 'required',
            'model' => 'required',
            'volume' => 'required',
            'additional_information' => 'required|max:255',
            'cylinders' => 'required',
            'body_type' => 'required',
            'engine_type' => 'required',
            'gearbox_type' => 'required',
            'steering_wheel' => 'required',
            'options' => 'required',
            'equipment' => 'required',
            'valves' => 'required',
            'number_of_doors' => 'required',
            'drive' => 'required',
            'gearbox_number' => 'required',

        ];
    }
}
