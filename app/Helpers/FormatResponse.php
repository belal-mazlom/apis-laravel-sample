<?php
/**
 * Created by PhpStorm.
 * User: belalmazlom
 * Date: 2020-12-20
 * Time: 21:29
 */

namespace App\Helpers;


class FormatResponse
{
    static function format($data, $unit = null)
    {
        $response = new \stdClass;
        $response->status = true;
        $response->data['value'] = $data;
        if (!empty($unit)) {
            $response->data['unit'] = $unit;
        }
        return $response;
    }

    static function formatError($exception)
    {
        $response = new \stdClass;
        $response->status = false;
        $response->error = $exception->getMessage();

        return $response;
    }
}