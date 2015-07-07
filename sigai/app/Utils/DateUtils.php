<?php namespace App\Utils;

use Carbon\Carbon;

class DateUtils {

    /**
     * Parse a date string based on the formats 'Y-m-d' or 'd/m/Y'.
     * @param $str
     * @return Carbon|null
     * @throws \InvalidArgumentException
     */
    public static function parseDate($str)
    {
        $date = null;

        try {
            $date = Carbon::createFromFormat('Y-m-d', $str);
        } catch (\InvalidArgumentException $e) {
            $date = Carbon::createFromFormat('d/m/Y', $str);
        }

        return $date;
    }
}