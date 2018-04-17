<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventsRequest extends FormRequest
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
          'name' => 'required | max:100',
          'description' => 'required | max:255',
          'duration' => 'numeric | max:2 ',
          'image_path' =>'image | mimes:jpeg | max:2000',
          'club_id' => 'required',
          'event_date' => 'required',
          'event_time' => 'required',
        ];
    }
}
