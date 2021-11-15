<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePost extends FormRequest
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
            'company'=> 'required',
            'pref_id'=> 'required',
            'city'=> 'required',
            'job'=> 'required',
            'officer'=> 'required',
        ];
    }

    public function attributes()
    {
        return [
            'company'=> '会社名',
            'pref_id'=> '都道府県名',
            'city'=> '住所',
            'job'=> '職種',
            'officer'=> '担当者名'
        ];
    }
}
