<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MissionStoreRequest extends FormRequest
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
            'type'          =>  [
                'required',
                Rule::in(['crash', 'landing', 'abduction', 'terror', 'council',]),
            ],
            'ufo'    =>  [
                'required_if:type, crash, landing',
                Rule::in(['scout', 'fighter', 'raider']),
            ],
            'difficulty'    =>  [
                'required_if:type, abduction',
                Rule::in(['light', 'moderate', 'heavy', 'swarming']),
            ],
            'council'    =>  [
                'required_if:type, council_mission',
                Rule::in(['siterecon', 'targetextraction', 'targetescort', 'assetrecovery', 'bombdisposal', 'slingshotprogeny']),

            ],
        ];
    }
}
