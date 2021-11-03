<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ReservationRule;
class ReservationRequest extends FormRequest
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
   //予約日と予約時間を結合して取得する。
   protected function prepareForValidation()
   {
    $reserve_date = ($this->filled(['reseve_day', 'reseve_time'])) ? $this->reseve_day .' '. $this -> reseve_time : '';
    $this->merge([
        'reserve_date' => $reserve_date
    ]);
   }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'reserve_day'=>'date|after:today',
                'reserve_time'=>'date_format:H:i',
                'people'=>'integer|min:1|max:12',
                'reserve_date'=>['after:now',
                    new ReservationRule(
                        $this->user_id,
                        $this->store_id,
                        $this->reserve_date,
                        $this->people
                    )]
            
        ];
    }
}
