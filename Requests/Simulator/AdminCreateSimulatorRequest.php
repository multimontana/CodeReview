<?php

namespace App\Requests\Admin\Simulator;

use App\Requests\AbstractFormRequest;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class AdminCreateSimulatorRequest extends AbstractFormRequest
{
    /**
     * @return bool|Authenticatable|null
     */
    public function authorize()
    {
        return Auth::user() ?? true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:256',
            'difficulty' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'price_en' => 'required|between:0,99.99',
            'price_ru' => 'required|between:0,99.99',
            'price_am' => 'required|between:0,99.99',
            'topics' => 'required',
            'language_name' => 'required|string|max:3'
        ];
    }
}
