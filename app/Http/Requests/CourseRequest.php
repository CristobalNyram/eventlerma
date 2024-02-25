<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Rules\NotNegativeNumbersSelect;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required', 'min:5'
            ],
            'description' => [
                'required', 'min:5'
            ],
            'date' => [
                'required', 'min:5'
            ],
            'speaker_id' => [
                'required',
                //new NotNegativeNumbersSelect(),
            ],
        ];
    }
}
