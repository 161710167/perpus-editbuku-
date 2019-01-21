<?php

namespace App\Traits;

use Carbon\Carbon;

/**
 *  Author : Ari Ardiansyah
 */
trait ConvertDate
{
    public function Convert($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
    public function Revert($value)
    {
        $data = explode('/', $value);
        return $data[2] . '-' . $data[1] . '-' . $data[0];
    }
    public function singleTime($value,$type)
    {
        return Carbon::parse($value)->format($type);
    }

}
