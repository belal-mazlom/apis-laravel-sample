<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Helpers\Time;

class TimeTest extends TestCase
{
    public function testGetTotalDays()
    {
        // Regular parameters
        $result1 = Time::getTotalDays('2020-12-15', '2020-12-20');
        $this->assertEquals($result1, 5);

        // Same date
        $result2 = Time::getTotalDays('2020-12-15', '2020-12-15');
        $this->assertEquals($result2, 0);

        // Reversed values
        $result3 = Time::getTotalDays('2020-12-10', '2020-12-20');
        $this->assertEquals($result3, 10);

        // get value by seconds
        $result4 = Time::getTotalDays('2020-12-10', '2020-12-20', 'seconds');
        $this->assertEquals($result4, 10 * 24 * 60 * 60);

        // get value by minutes
        $result5 = Time::getTotalDays('2020-12-15', '2020-12-20', 'minutes');
        $this->assertEquals($result5, 5 * 24 * 60);

        // get value by hours
        $result6 = Time::getTotalDays('2020-12-15', '2020-12-20', 'hours');
        $this->assertEquals($result6, 5 * 24);

        // get value by years
        $result7 = Time::getTotalDays('2019-01-01', '2021-01-01', 'years');
        $this->assertEquals($result7, 2);


        // Pass null parameters throw exception
        try {
            $this->expectException(Time::getTotalDays(null, null));
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), 'Missing parameters');
        }
    }

    public function testGetTotalWeekends()
    {
        // Regular parameters
        $result1 = Time::getTotalWeekdays('2020-11-15', '2020-12-15');
        $this->assertEquals($result1, 22);

        // Only weekends
        $result2 = Time::getTotalWeekdays('2020-12-19', '2020-12-20');
        $this->assertEquals($result2, 0);

        // Reversed values
        $result3 = Time::getTotalWeekdays('2020-12-20', '2020-12-15');
        $this->assertEquals($result3, 4);

        // total weekdays by seconds
        $result4 = Time::getTotalWeekdays('2020-11-15', '2020-12-15', 'seconds');
        $this->assertEquals($result4, 22 * 24 * 60 * 60);

        // total weekdays by minutes
        $result5 = Time::getTotalWeekdays('2020-11-15', '2020-12-15', 'minutes');
        $this->assertEquals($result5, 22 * 24 * 60);

        // total weekdays by hours
        $result6 = Time::getTotalWeekdays('2020-11-15', '2020-12-15', 'hours');
        $this->assertEquals($result6, 22 * 24);

        // total weekdays by years
        $result7 = Time::getTotalWeekdays('2020-11-15', '2020-12-15', 'years');
        $this->assertEquals($result7, 0);

        // Pass null parameters throw exception
        try {
            $this->expectException(Time::getTotalWeekdays(null, null));
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), 'Missing parameters');
        }
    }

    public function testGetCompleteWeeks()
    {
        // Regular parameters
        $result1 = Time::getTotalCompleteWeeks('2020-12-19', '2020-12-26');
        $this->assertEquals($result1, 1);

        // Multiple weeks
        $result2 = Time::getTotalCompleteWeeks('2020-12-01', '2020-12-31');
        $this->assertEquals($result2, 3);

        // Reversed values
        $result3 = Time::getTotalCompleteWeeks('2020-12-26', '2020-12-19');
        $this->assertEquals($result3, 1);

        // Complete weeks by seconds
        $result4 = Time::getTotalCompleteWeeks('2020-12-01', '2020-12-31', 'seconds');
        $this->assertEquals($result4, 3 * 7 * 24 * 60 * 60);

        // Complete weeks by minutes
        $result5 = Time::getTotalCompleteWeeks('2020-12-01', '2020-12-31', 'minutes');
        $this->assertEquals($result5, 3 * 7 * 24 * 60);

        // Complete weeks by hours
        $result6 = Time::getTotalCompleteWeeks('2020-12-01', '2020-12-31', 'hours');
        $this->assertEquals($result6, 3 * 7 * 24);

        // Complete weeks by days
        $result7 = Time::getTotalCompleteWeeks('2020-12-01', '2020-12-31', 'days');
        $this->assertEquals($result7, 3 * 7);

        // Complete weeks by years
        $result8 = Time::getTotalCompleteWeeks('2020-12-01', '2020-12-31', 'years');
        $this->assertEquals($result8, 0);


        // Pass null parameters throw exception
        try {
            $this->expectException(Time::getTotalCompleteWeeks(null, null));
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), 'Missing parameters');
        }
    }
}
