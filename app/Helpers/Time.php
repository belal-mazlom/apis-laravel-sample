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
    static function isWeekend($date) {
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
        $totalWeekDays = 0;
        for ($i = 0; $i < $diffTime->days; $i++) {
            $date = date('Y-m-d', strtotime($timeOne. " +$i day"));
            if (!self::isWeekend($date)) {
                $totalWeekDays++;
            }
        }
        return $totalWeekDays;
    }
}