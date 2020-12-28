<?php
/**
 * Created by PhpStorm.
 * User: belalmazlom
 * Date: 2020-12-20
 * Time: 21:29
 */

namespace App\Helpers;


class Time
{
    /**
     * @param $timeOne String format ex: 2020-10-20
     * @param $timeTwo String format ex: 2020-05-10
     * @throws \Exception if one parameter is empty or null
     */
    static function checkParameters($timeOne, $timeTwo)
    {
        if (is_null($timeOne) ||
            is_null($timeTwo) ||
            empty($timeOne) ||
            empty($timeTwo)) {
            throw new \Exception('Missing parameters');
        }

        $date1Parse = date_parse($timeOne);
        $date2Parse = date_parse($timeTwo);

        if (count($date1Parse['errors']) > 0) {
            throw new \Exception('Invalid date1 parameter');
        }

        if (count($date2Parse['errors']) > 0) {
            throw new \Exception('Invalid date2 parameter');
        }
    }

    /**
     * @param $date String format ex: 2020-10-20
     * @return bool true if weekend false if otherwise
     */
    static function isWeekend($date)
    {
        return in_array(date('l', strtotime($date)), ['Saturday', 'Sunday']);
    }

    /**
     * Convert from days to target time unit
     * @param $val
     * @param $unit
     * @return float|int
     */
    static function toUnit($val, $unit)
    {

        switch ($unit) {
            case  'seconds':
                return $val * 24 * 60 * 60;
            case  'minutes':
                return $val * 24 * 60;
            case  'hours':
                return $val * 24;
            case  'years':
                return intval($val / 365);
            default:
                return $val;
        }
    }

    /**
     * Check validate of time zone
     * @param $timezone String represent target timezone
     * @return String same value if valid or default Application timezone
     */
    static function validateTimeZone($timezone)
    {
        $timezone = strtolower($timezone);
        if (in_array($timezone, \config('constraints.timezones')) ||
            in_array($timezone, \config('constraints.timezones_abbr'))) {
            return $timezone;
        }
        return \config('app.timezone');
    }

    /**
     * @param $timeOne String format ex: 2020-10-20
     * @param $timeTwo String format ex: 2020-05-10
     * @param $timeZone1 String represent timezone of $timeOne
     * @param $timeZone2 String represent timezone of $timeTwo
     * @param $unit String of base unit of returned result
     * @return mixed
     * @throws \Exception if one parameter is empty or null
     */
    static function getTotalDays($timeOne, $timeTwo, $timeZone1 = null, $timeZone2 = null, $unit = 'days')
    {
        self::checkParameters($timeOne, $timeTwo);
        $timeZone1 = self::validateTimeZone($timeZone1);
        $timeZone2 = self::validateTimeZone($timeZone2);

        $dateTimeOne = new \DateTime($timeOne, new \DateTimeZone($timeZone1));
        $dateTimeTwo = new \DateTime($timeTwo, new \DateTimeZone($timeZone2));

        $diffTime = $dateTimeTwo->diff($dateTimeOne);
        $days = $diffTime->days;

        return self::toUnit($days, strtolower($unit));
    }

    /**
     * @param $timeOne String format ex: 2020-10-20
     * @param $timeTwo String format ex: 2020-05-10
     * @param $timeZone1 String represent timezone of $timeOne
     * @param $timeZone2 String represent timezone of $timeTwo
     * @param $unit String of base unit of returned result
     * @return mixed
     * @throws \Exception if one parameter is empty or null
     */
    static function getTotalWeekdays($timeOne, $timeTwo, $timeZone1 = null, $timeZone2 = null, $unit = 'days')
    {
        self::checkParameters($timeOne, $timeTwo);
        $timeZone1 = self::validateTimeZone($timeZone1);
        $timeZone2 = self::validateTimeZone($timeZone2);

        $dateTimeOne = new \DateTime($timeOne, new \DateTimeZone($timeZone1));
        $dateTimeTwo = new \DateTime($timeTwo, new \DateTimeZone($timeZone2));

        $diffTime = $dateTimeTwo->diff($dateTimeOne);
        $countDays = $diffTime->days + 1;
        $totalWeekDays = 0;
        $startTime = $timeOne < $timeTwo ? $timeOne : $timeTwo;

        for ($i = 0; $i < $countDays; $i++) {
            $date = date('Y-m-d', strtotime($startTime . " +$i day"));
            if (!self::isWeekend($date)) {
                $totalWeekDays++;
            }
        }
        return self::toUnit($totalWeekDays, strtolower($unit));
    }

    /**
     * @param $timeOne String format ex: 2020-10-20
     * @param $timeTwo String format ex: 2020-05-10
     * @param $timeZone1 String represent timezone of $timeOne
     * @param $timeZone2 String represent timezone of $timeTwo
     * @param $unit String of base unit of returned result
     * @return mixed
     * @throws \Exception if one parameter is empty or null
     */
    static function getTotalCompleteWeeks($timeOne, $timeTwo, $timeZone1 = null, $timeZone2 = null, $unit = 'weeks')
    {
        self::checkParameters($timeOne, $timeTwo);
        $timeZone1 = self::validateTimeZone($timeZone1);
        $timeZone2 = self::validateTimeZone($timeZone2);

        $dateTimeOne = new \DateTime($timeOne, new \DateTimeZone($timeZone1));
        $dateTimeTwo = new \DateTime($timeTwo, new \DateTimeZone($timeZone2));

        $diffTime = $dateTimeTwo->diff($dateTimeOne);
        $totalCompleteWeeks = 0;
        // To calc complete week
        $startTime = $timeOne < $timeTwo ? $timeOne : $timeTwo;
        $countDays = $diffTime->days + 1;
        $totalDays = 0;
        $count = false;

        for ($i = 0; $i < $countDays; $i++) {
            $date = date('w', strtotime($startTime . " +$i day"));
            if ($date == '0') {
                $count = true;
            }
            if ($count) {
                $totalDays++;
            }
            if ($totalDays == 7) {
                $totalDays = 0;
                $totalCompleteWeeks++;
            }
        }

        $unit = strtolower($unit);

        if ($unit == 'weeks') {
            return $totalCompleteWeeks;
        }
        return self::toUnit($totalCompleteWeeks * 7, $unit);
    }
}