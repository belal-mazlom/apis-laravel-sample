<?php
/**
 * Created by PhpStorm.
 * User: belalmazlom
 * Date: 2020-12-23
 * Time: 00:28
 */

return [
    'timezones' => array_map('strtolower', \DateTimeZone::listIdentifiers()),
    'timezones_abbr' => array_keys(\DateTimeZone::listAbbreviations()),
];