<?php

namespace AutoKit\Http\Requests;

use AutoKit\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class MoreProductsRequest extends FormRequest
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
            'title' => 'required|max:255',
            'article' => 'required|max:255',
            'count' => 'required|max:255',
            'info' => 'required|max:255'
        ];
    }
}
