<?php

namespace App\Repositories;

use Morilog\Jalali\CalendarUtils;

class convertDateRepository
{
    public static function convertToMiladi($date)
    {
        $dateString=self::convertNumbers($date);
        return CalendarUtils::createDatetimeFromFormat('Y/m/d', $dateString);
    }


    public static function convertToShamsi($date)
    {
        return jdate($date)->format( "%d %B، %Y");
    }


    public static function convertNumbers($date)
    {
        return CalendarUtils::convertNumbers($date, true);
    }
}
