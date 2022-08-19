<?php

namespace App\Utilities;

use function App\Utilities\ArrayHelpers\findInArr;

class Json
{
    static public function search(string $needle, string $json)
    {
        $jsonToArr = json_decode($json, true);
        return json_encode([$needle => findInArr($needle, $jsonToArr)], JSON_UNESCAPED_SLASHES);
    }

    static public function validate(string $json, array $validFields)
    {
        $jsonToArr = json_decode($json, true);
        $keys = array_keys($jsonToArr);
        $diff = array_diff($keys, $validFields);
        return empty($diff);
    }
}


