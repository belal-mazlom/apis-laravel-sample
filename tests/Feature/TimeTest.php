<?php

namespace Tests\Feature;

use Tests\TestCase;

class TimeTest extends TestCase
{
    public function testTotalDaysApi()
    {
        // Test base parameters
        $response = $this->get('/api/time/total-days?date1=2020-10-10&date2=2020-10-29');
        $response
            ->assertStatus(200)
            ->assertJson([
                "status" => true,
                "data" => [
                    "value" => 19,
                    "unit" => "days"
                ],
            ]);

        // Test full parameters
        $response = $this->get('/api/time/total-days?date1=2020-10-10&date2=2020-10-29&tz1=pst&tz2=GMT%2B10&unit=seconds');
        $response
            ->assertStatus(200)
            ->assertJson([
                "status" => true,
                "data" => [
                    "value" => 1555200,
                    "unit" => "seconds"
                ],
            ]);
    }

    public function testTotalWeekdaysApi()
    {
        // Test base parameters
        $response = $this->get('/api/time/total-weekdays?date1=2020-10-10&date2=2020-10-29');
        $response
            ->assertStatus(200)
            ->assertJson([
                "status" => true,
                "data" => [
                    "value" => 14,
                    "unit" => "days"
                ],
            ]);

        // Test full parameters
        $response = $this->get('/api/time/total-weekdays?date1=2020-10-10&date2=2020-10-29&tz1=pst&tz2=GMT%2B10&unit=seconds');
        $response
            ->assertStatus(200)
            ->assertJson([
                "status" => true,
                "data" => [
                    "value" => 1123200,
                    "unit" => "seconds"
                ],
            ]);
    }

    public function testCompleteWeeksApi()
    {
        // Test base parameters
        $response = $this->get('/api/time/complete-weeks?date1=2020-10-10&date2=2020-10-29');
        $response
            ->assertStatus(200)
            ->assertJson([
                "status" => true,
                "data" => [
                    "value" => 2,
                    "unit" => "weeks"
                ],
            ]);

        // Test full parameters
        $response = $this->get('/api/time/complete-weeks?date1=2020-10-10&date2=2020-10-29&tz1=pst&tz2=GMT%2B10&unit=seconds');
        $response
            ->assertStatus(200)
            ->assertJson([
                "status" => true,
                "data" => [
                    "value" => 1209600,
                    "unit" => "seconds"
                ],
            ]);
    }
}
