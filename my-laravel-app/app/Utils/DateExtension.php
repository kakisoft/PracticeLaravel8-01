<?php

namespace App\Utils;

class DateExtension
{
    /**
     * Returns True if the expression is a date or is recognizable as a valid date or time; otherwise, it returns False.
     *
     * @param string $value
     * @return bool
     */
    public static function isDate($value)
    {
        if ((!is_string($value) && !is_numeric($value)) || strtotime($value) === false) {
            return false;
        }

        $date = date_parse($value);

        return checkdate($date['month'], $date['day'], $date['year']);
    }
}
