<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name'=>'required|string|min:2',
            'user_id'=>'required|numeric|exists:users,id'
        ];
    }

    public function messages() : array
    {
        return [
            'name.required'=>'A categoria precisa de um nome',
            'name.string'=>'A categoria precisa que o nome seja escrito',
            'name.min'=>'A categoria precisa de ter no mínimo 2 letras',
            'user_id.required'=>'O usuário é obrigatório',
            'user_id.numeric'=>'O usuário precisa ter uma identificação numérica',
            'user_id.exists'=>'O usuário informado não foi encontrado na nossa base',
        ];
    }
}
