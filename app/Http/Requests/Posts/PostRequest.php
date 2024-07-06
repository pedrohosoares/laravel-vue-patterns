<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'content'=>'required|string|min:15',
            'resume'=>'required|string|min:15',
            'title'=>'required|string|min:15',
            'slug'=>'required|string|min:15',
            'thumb'=>'nullable',
            'user_id'=>'required|integer|exists:users,id',
            'schedule_at'=>'nullable'
        ];
    }

    public function messages()
    {
        return [
            'content.required'=>'O texto do post é obrigatório',
            'content.min'=>'O texto do post precisa ter no mínimo 15 caracteres',
            'content.string'=>'O texto do post é obrigatório',
            'resume.required'=>'O resumo do texto é obrigatório',
            'resume.min'=>'O resumo do texto precisa ter no mínimo 15 caracteres',
            'resume.string'=>'O resumo precisa ser um texto',
            'title.required'=>'O título do post é obrigatório',
            'title.min'=>'O título do post precisa ter no mínimo 15 caracteres',
            'title.string'=>'O títutlo do post deve ser um texto',
            'slug.required'=>'O slug do post é obrigatório',
            'slug.string'=>'O slug precisa ser um texto',
            'user_id.required'=>'O usuário é obrigatório',
            'user_id.integer'=>'O valor do usuário precisa ser um número inteiro',
            'user_id.exists'=>'O usuário informado não foi encontrado'
        ];
    }
}
