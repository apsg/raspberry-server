<?php
namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class MeasurementsStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'temp'     => 'required|numeric',
            'humidity' => 'required|numeric|min:0|max:100',
        ];
    }
}
