<?php


namespace App\Service;


use DateTime;

class DaysService
{

    /**
     * DaysService constructor.
     */
    public function __construct()
    {
    }

    public function getUTCOffset()
    {
        $first = new \DateTimeZone('Africa/Bangui');
        $second = new \DateTimeZone('UTC');
        $inSeconds =  $first->getOffset(new DateTime('now', $second));

        return $inSeconds/60;
    }
}