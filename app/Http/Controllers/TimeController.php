<?php
/**
 * Created by PhpStorm.
 * User: belalmazlom
 * Date: 2020-12-20
 * Time: 21:35
 */

namespace App\Http\Controllers;

use App\Helpers\FormatResponse;
use Illuminate\Routing\Controller as BaseController;
use App\Helpers\Time;

class TimeController extends BaseController
{
    public function getTotalDays($date1 = null, $date2 = null)
    {
        try {
            $days = Time::getTotalDays($date1, $date2);
            $response = FormatResponse::formatResponse($days);
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = FormatResponse::formatError($e);
            return response()->json($response, 400);
        }
    }

    public function getTotalWeekdays ($date1 = null, $date2 = null) {
        try {
            $days = Time::getTotalWeekdays($date1, $date2);
            $response = FormatResponse::formatResponse($days);
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = FormatResponse::formatError($e);
            return response()->json($response, 400);
        }
    }
}