<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'time' => 'required|date_format:H:i',
            'duration' => 'required|string',
            'date' => 'required|date',
            'url_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:1,2',
            'type_event_id' => 'required|exists:type_events,id',
            'place_events_id' => 'required|exists:place_events,id',
            'type_public_id' => 'required|exists:type_public,id',
        ];
    }
}
