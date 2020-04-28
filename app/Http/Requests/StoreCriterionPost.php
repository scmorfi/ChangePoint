<?php

namespace App\Http\Requests;

use App\Rules\Fieldsrequired;
use App\Rules\IllegalCriteriaField;
use App\Rules\TotalPercentage;
use App\Rules\Valuesnumeric;
use App\Rules\Percentrequired;
use Illuminate\Foundation\Http\FormRequest;

class StoreCriterionPost extends FormRequest
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
            "criteria" => [new TotalPercentage, new Fieldsrequired, new Percentrequired, new Valuesnumeric, new IllegalCriteriaField("price")]

        ];
    }
}
