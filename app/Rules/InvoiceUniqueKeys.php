<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\invoice;

class InvoiceUniqueKeys implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $compareFieldName;
    private $compareFieldValue;
    private $id;
    public function __construct($compareFieldName, $compareFieldValue,$id='')
    {
        $this->compareFieldName=$compareFieldName;
        $this->compareFieldValue=$compareFieldValue;
        $this->id=$id;
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

        return empty($this->id)
        ?

        !invoice::where($this->compareFieldName, $this->compareFieldValue)
        ->where($attribute, $value)->count()
        :
        !invoice::where($this->compareFieldName, $this->compareFieldValue)
                ->where([[$attribute ,$value],['id','<>',$this->id]])->count();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'مقادیر انتخابی شرکت و پکیج قبلا انتخاب شده اند';
    }
}
