<?php


namespace App\Model;


use DateTime;

class Month
{
    private $month;

    public function __construct(string $date)
    {
        $this->month = (new DateTime($date))->format('F');
    }

    public function __toString()
    {
        return $this->month;
    }
}