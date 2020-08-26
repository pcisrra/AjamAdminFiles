<?php

namespace App\Http\Requests;

use App\Models\File;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('file_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ext_dates'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'description'  => [
                'string',
                'required',
            ],
            'background'   => [
                'string',
                'max:200',
                'nullable',
            ],
            'quantity'     => [
                'string',
                'max:120',
                'nullable',
            ],
            'num_folios'   => [
                'string',
                'max:100',
                'nullable',
            ],
            'observations' => [
                'string',
                'nullable',
            ],
        ];
    }
}
