<?php

namespace Tests\Unit;

use App\Helpers\FormatResponse;
use Tests\TestCase;

class FormatResponseTest extends TestCase
{
    public function testNormalResponse()
    {
        $response = FormatResponse::format(10, 'weeks');
        $this->assertEquals(json_encode($response), '{"status":true,"data":{"value":10,"unit":"weeks"}}');
    }

    public function testErrorResponse()
    {
        $response = FormatResponse::formatError(new \Exception('Missing parameters'));
        $this->assertEquals(json_encode($response), '{"status":false,"error":"Missing parameters"}');
    }
}
