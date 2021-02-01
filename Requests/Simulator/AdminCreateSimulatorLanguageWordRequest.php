<?php

namespace App\Requests\Admin\Simulator;

use App\Requests\AbstractFormRequest;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class AdminCreateSimulatorLanguageWordRequest extends AbstractFormRequest
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
            'en' => 'required',
            'en_transcription' => 'required',
            'ru' => 'required',
            'am' => 'required',
            'es' => 'required',
            'fr' => 'required',
            'de' => 'required',
            'ar' => 'required',
            'it' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:256',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
