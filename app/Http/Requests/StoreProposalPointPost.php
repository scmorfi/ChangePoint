<?php

namespace App\Http\Requests;

use App\Rules\RequireCriteria;
use App\Rules\ValidProposalPointId;
use App\Rules\ValidPoint;
use App\Rules\ValidProposalId;
use Illuminate\Foundation\Http\FormRequest;

class StoreProposalPointPost extends FormRequest
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
            "data" => [new ValidPoint]
        ];
    }
}
