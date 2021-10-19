<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as IlluminateRule;
use App\Models\fetch_device;

class DeviceUniqueKeys implements Rule
{

    private $compareFieldName;
    private $compareFieldValue;
    private $id;
    public function __construct($compareFieldName, $compareFieldValue, $id = '')
    {
        $this->compareFieldName = $compareFieldName;
        $this->compareFieldValue = $compareFieldValue;
        $this->id = $id;
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

        // dd($this->id,empty( $this->id),$this->secondFiledName,$this->secondFiledValue);
        // dd($this->updataDevice,$this->state['device_id']);
       return empty($this->id)
        ?
        !fetch_device::query()->where([[$this->compareFieldName,$this->compareFieldValue],[$attribute,$value]])->count()
       
        :!fetch_device::query()->where([[$this->compareFieldName, $this->compareFieldValue], [$attribute, $value],['id','<>',$this->id]])->count();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "شرکت و دستگاه انتخابی قبلا ایجاد شده است";
    }
}
