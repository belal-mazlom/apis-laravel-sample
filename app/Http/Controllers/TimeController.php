<?php
/**
 * Created by PhpStorm.
 * User: belalmazlom
 * Date: 2020-12-20
 * Time: 21:35
 */

namespace App\Http\Controllers;

use App\Helpers\FormatResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Helpers\Time;

class TimeController extends BaseController
{
    public function getTotalDays(Request $request)
    {
        $date1 = $request->input('date1', null);
        $date2 = $request->input('date2', null);
        $timeZone1 = $request->input('tz1', null);
        $timeZone2 = $request->input('tz2', null);
        $unit = $request->input('unit', 'days');

        try {
            $days = Time::getTotalDays($date1, $date2, $timeZone1, $timeZone2, $unit);
            $response = FormatResponse::formatResponse($days, $unit);
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = FormatResponse::formatError($e);
            return response()->json($response, 400);
        }
    }

    public function getTotalWeekdays(Request $request)
    {
        $date1 = $request->input('date1', null);
        $date2 = $request->input('date2', null);
        $timeZone1 = $request->input('tz1', null);
        $timeZone2 = $request->input('tz2', null);
        $unit = $request->input('unit', 'days');

        try {
            $days = Time::getTotalWeekdays($date1, $date2, $timeZone1, $timeZone2, $unit);
            $response = FormatResponse::formatResponse($days, $unit);
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = FormatResponse::formatError($e);
            return response()->json($response, 400);
        }
    }

    public function getCompleteWeeks(Request $request)
    {
        $date1 = $request->input('date1', null);
        $date2 = $request->input('date2', null);
        $timeZone1 = $request->input('tz1', null);
        $timeZone2 = $request->input('tz2', null);
        $unit = $request->input('unit', 'weeks');

        try {
            $weeks = Time::getTotalCompleteWeeks($date1, $date2, $timeZone1, $timeZone2, $unit);
            $response = FormatResponse::formatResponse($weeks, $unit);
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = FormatResponse::formatError($e);
            return response()->json($response, 400);
        }
    }
}