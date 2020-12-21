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
        $result = Time::getTotalWeekdays('2020-11-15', '2020-12-15');
        $this->assertEquals($result, 21);

        // Only weekends
        $result = Time::getTotalWeekdays('2020-12-19', '2020-12-20');
        $this->assertEquals($result, 0);

        // Reversed values
        $result3 = Time::getTotalWeekdays('2020-12-20', '2020-12-15');
        $this->assertEquals($result3, 4);

        // Pass null parameters throw exception
        try {
            $this->expectException(Time::getTotalWeekdays(null, null));
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), 'Missing parameters');
        }
    }
}
