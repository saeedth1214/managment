<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class inArray implements Rule
{
    private $packageIds=[];
    public function __construct($ids)
    {
        $this->packageIds=$ids;
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
        // dd(array_diff($value, $this->packageIds));
        return blank(array_diff($value, $this->packageIds));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'لطفا مقادیر معتبری را انتخاب کنید';
    }
}
