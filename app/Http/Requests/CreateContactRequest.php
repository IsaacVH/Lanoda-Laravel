<?php

namespace Lanoda\Http\Requests;

use Lanoda\Http\Requests\Request;

class CreateContactRequest extends Request
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
            'firstname' => 'required|min:1',
            'lastname' => 'required|min:1',
            'birthday' => 'date'
        ];
    }
}
