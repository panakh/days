<?php

namespace App\Model;

use DateTime;

class Days
{
    private $days;

    private function __construct(DateTime $dateTime)
    {
        $this->days = intval($dateTime->format('t'));
    }

    public static function inFebruary(string $date): self
    {
        $date = new DateTime($date);
        $time = mktime(0, 0, 0, 2, 1, $date->format('Y'));
        return new static(new DateTime('@'.$time));
    }

    public static function inMonthOf($date): self
    {
        return new static(new DateTime($date));
    }

    public function __toString()
    {
        return (string) $this->days;
    }

    public function get(): int
    {
        return $this->days;
    }
}