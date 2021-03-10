<?php


namespace App\Model;


use DateTime;
use DateTimeZone;

class Offset
{
    private $inSeconds;

    public function __construct(string $date, string $timezone)
    {
        $dateTime = new DateTime($date, new DateTimeZone($timezone));
        $inSeconds =  $dateTime->getOffset();

        $this->inSeconds = intval(round($inSeconds/60));
    }

    public function get(): int
    {
        return $this->inSeconds;
    }

    public function __toString()
    {
        return sprintf('%+d', $this->inSeconds);
    }
}