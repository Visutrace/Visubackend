<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreTraceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        //todo: find some gosh darn reason I can't validate a csv mimetype
        return [
            'traces'       => 'required|mimes:csv,txt',
            'name' => 'required'
        ];
    }
}
