<?php

namespace App\Http\Requests\task;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Offer;

use Auth;

class AddTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $count = Offer::find($this->offer)->task()->count();

        if($count){
            return false;
        }

        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'nullable',
        ];
    }
}
