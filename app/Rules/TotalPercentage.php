<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TotalPercentage implements Rule
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
        return (array_sum(array_column($value,"percent")) <= 100 );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The total percentage should not be more than 100%';
    }
}
