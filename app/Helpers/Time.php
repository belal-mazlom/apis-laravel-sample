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
     * @return mixed
     * @throws \Exception if one parameter is empty or null
     */
    static function getTotalDays($timeOne, $timeTwo)
    {
        if (is_null($timeOne) ||
            is_null($timeTwo) ||
            empty($timeOne) ||
            empty($timeTwo)) {
            throw new \Exception('Missing parameters');
        }
        $dateTimeOne = new \DateTime($timeOne);
        $dateTimeTwo = new \DateTime($timeTwo);
        $diffTime = $dateTimeTwo->diff($dateTimeOne);
        return $diffTime->days;
    }
}