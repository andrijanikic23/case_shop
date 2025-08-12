<?php

namespace App\Http;


class JobHelper
{
    const DEPARTMENT = [
        1 => "IT",
        2 => "HR",
        3 => "Marketing",
    ];

    public static function departmentName($departmentId)
    {
        $departmentName = self::DEPARTMENT[$departmentId];

        return $departmentName;
    }
}
