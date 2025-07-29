<?php

namespace App\Http;

class ReviewsHelper
{
    const STARS_NUMBER = [
        1 => "★☆☆☆☆",
        2 => "★★☆☆☆",
        3 => "★★★☆☆",
        4 => "★★★★☆",
        5 => "★★★★★"
    ];

    public static function getStarsNumber($rating)
    {
        $starsNumber = self::STARS_NUMBER[$rating];
        return $starsNumber;
    }
}
