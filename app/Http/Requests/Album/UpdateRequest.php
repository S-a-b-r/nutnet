<?php

namespace App\Http\Requests\Album;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=> 'required|string',
            'artist'=>'required|string',
            'description'=>'string',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Поле album name должно быть заполнено',
            'name.string'=>'Поле album name должно быть строкой',
            'artist.required'=>'Поле artist должно быть заполнено',
            'artist.string'=>'Поле artist должно быть строкой',
            'description.string'=>'Поле description должно быть строкой',
        ];
    }
}
