<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            //'quantity' => 'required|numeric|between:1,20'
            'quantity' => 'required|numeric'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {   
        $validator->sometimes('quantity', 'between:1,20', function ($input) {
            return $input->quantity < $input->product_quantity;
        });

        $validator->after(function ($validator){
            if ($this->requestQtyGreaterThanProductQty()) {
                $validator->errors()->add(
                    'quantity', 
                    'We currently do not have enough items in stock.'
                );
            }
        });
    }

    public function messages()
    {
        return [
            'between' => 'Quantity must be between 1 and 20.'
        ];
    }

    private function requestQtyGreaterThanProductQty()
    {
        return $this->quantity > $this->product_quantity;
    }
}
