<?php

namespace App\Helpers\Collector;

use DateTime;

class ProductCollectorHelper
{
    public static function parseToMB(string $capacityGB): int
    {
        return (int)$capacityGB * 1024;
    }

    public static function removePrefixInText(string $availability, string $prefix): string
    {
        return str_replace($prefix, '', $availability);
    }

    public static function parseShippingDate(string $text): ?string
    {
        $text = 'Delivers Tuesday 24th Oct 2023';
        $datePattern1 = '/\b\d{1,2} \w{3} \d{4}\b/';
        $datePattern2 = '/\b\d{4}-\d{2}-\d{2}\b/';
        $datePattern3 = '/\b(?:tomorrow|yesterday|today)\b/i';
        $datePattern4 = '/\d{1,2}(th|st|nd|rd) \w{3} \d{4}/';

        preg_match($datePattern1, $text, $matches1);
        preg_match($datePattern2, $text, $matches2);
        preg_match($datePattern3, $text, $matches3);
        preg_match($datePattern4, $text, $matches4);

        $date1 = DateTime::createFromFormat('j M Y', $matches1[0] ?? '');
        $date2 = DateTime::createFromFormat('Y-m-d', $matches2[0] ?? '');
        $date3 = count($matches3) ? date('Y-m-d', strtotime($matches3[0])) : false;
        $date4 = DateTime::createFromFormat('jS F Y', $matches4[0] ?? '');

        return match (true) {
            (bool) $date1 =>  $date1->format("Y-m-d"),
            (bool) $date2 =>  $date2->format("Y-m-d"),
            (bool) $date3 =>  $date3,
            (bool) $date4 =>  $date4->format("Y-m-d"),
            default => null,
        };
    }
}