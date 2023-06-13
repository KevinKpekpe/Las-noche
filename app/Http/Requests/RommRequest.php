<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RommRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','min:4'],
            'slug' => ['required','min:4','regex:/^[a-zA-Z0-9\-]+$/',Rule::unique('rooms')->ignore($this->route()->parameter('post'))],
            'content' => ['required'],
            'category_id' => ['required','exists:categories,id'],
            'specificities' => ['required','array','exists:specificities,id','required'],
            'image' => ['image','max:2000'],
            'etat'=> ['required','boolean'],
            'numberofperson' => ['required','integer','min:1'],
            'price' => ['required','integer']
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'slug'=> $this->input('slug') ?: Str::slug($this->input('title'))
        ]);
    }
}
