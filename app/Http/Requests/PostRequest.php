<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rules = [
			'title' => 'required',
			'status' => 'required',
		];

		if ($this->method() == 'POST') {
			$rules['featured_img'] = 'required|image|mimes:jpeg,png,jpg,gif|max:4096';
		}

		return $rules;
    }
}
