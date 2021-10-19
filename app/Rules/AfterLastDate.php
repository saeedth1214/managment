<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\company;
use App\Repositories\convertDateRepository;
use Illuminate\Support\Facades\DB;

class AfterLastDate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $companyId;
    public function __construct($companyId)
    {
        $this->companyId=$companyId;
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
        return blank(DB::table('company_has_package')->where([
                ['start_at', '<=', $this->changeToMiladi($value)],
                ['end_at', '>=', $this->changeToMiladi($value)],
                ['company_id', $this->companyId]
            ])->get());
    }

    public function changeToMiladi($date)
    {
        return convertDateRepository::convertToMiladi($date);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'درتاریخ انتخابی شما یک پکیج قعال وجود دارد';
    }
}
