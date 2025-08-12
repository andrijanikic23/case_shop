<?php

namespace App\Http;

class ProductsHelper
{
    const TITLE_CHOICES = [
        1 => "Cases - MaskeShop.rs",
        2 => "Chargers - MaskeShop.rs",
        3 => "Headphones - MaskeShop.rs",
    ];

    public static function getTitle($productCategory)
    {
        $title = self::TITLE_CHOICES[$productCategory];

        return $title;
    }
}
