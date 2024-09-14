<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ExcludeModelNameIfModelId implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(request()->model_id && request()->brand_id)
        {
            return FALSE;
        }

        return TRUE;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Model name cannot have a value if model is selected');
    }
}
