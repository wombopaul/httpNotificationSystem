<?php

namespace App\Http\Requests;

use App\Traits\BaseResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreSubscriberRequest extends FormRequest
{
    use BaseResponse;
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //'topic' => 'required|string',
            'url' => 'required|url',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->errorResponse( $validator->errors(), 'Validation errors', Response::HTTP_BAD_REQUEST)
        );

    }

    public function messages() //OPTIONAL
    {
        return [
            //'topic.required' => 'topic is required',
            //'topic.string' => 'topic must be a string',
            'url.required' => 'url is required',
            'url.url' => 'url is not valid',
        ];
    }
}
