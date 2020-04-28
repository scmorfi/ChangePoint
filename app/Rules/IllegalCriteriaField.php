<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IllegalCriteriaField implements Rule
{
    private $illegalField;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(String $illegalField)
    {
        $this->illegalField = $illegalField;
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

         if (array_search($this->illegalField,array_column($value,"field"))===false)
             return true;
         return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
