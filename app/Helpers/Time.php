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
     * @param $timeOne String format ex: 2020-10-20
     * @param $timeTwo String format ex: 2020-05-10
     * @return mixed
     * @throws \Exception if one parameter is empty or null
     */
    static function getTotalDays($timeOne, $timeTwo)
    {
        self::checkParameters($timeOne, $timeTwo);
        $dateTimeOne = new \DateTime($timeOne);
        $dateTimeTwo = new \DateTime($timeTwo);
        $diffTime = $dateTimeTwo->diff($dateTimeOne);
        return $diffTime->days;
    }

    /**
     * @param $timeOne String format ex: 2020-10-20
     * @param $timeTwo String format ex: 2020-05-10
     * @return mixed
     * @throws \Exception if one parameter is empty or null
     */
    static function getTotalWeekdays($timeOne, $timeTwo)
    {
        self::checkParameters($timeOne, $timeTwo);
        $dateTimeOne = new \DateTime($timeOne);
        $dateTimeTwo = new \DateTime($timeTwo);
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
        return $totalWeekDays;
    }

    /**
     * @param $timeOne String format ex: 2020-10-20
     * @param $timeTwo String format ex: 2020-05-10
     * @return mixed
     * @throws \Exception if one parameter is empty or null
     */
    static function getTotalCompleteWeeks($timeOne, $timeTwo)
    {
        self::checkParameters($timeOne, $timeTwo);
        $dateTimeOne = new \DateTime($timeOne);
        $dateTimeTwo = new \DateTime($timeTwo);
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
        return $totalCompleteWeeks;
    }
}