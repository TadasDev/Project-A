<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title'=>['required','max:55','string'],
            'description'=>['required','max:255','string'],
            'price'=>['required','numeric','max:255','min:1',],
            'images'=>['required','mimes:jpeg,png,gif','max:2048']
        ];
    }
}
