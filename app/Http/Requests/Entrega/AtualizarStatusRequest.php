<?php

namespace App\Http\Requests\Entrega;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

class AtualizarStatusRequest extends BaseRequest
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
            'status' => 'required',
        ];
    }

    public function messages ()
    {
        return [
            'required' => 'O atributo :attribute é obrigatório.',
        ];
    }
}
