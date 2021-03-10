<?php

namespace App\Model;


use DateTime;
use DateTimeZone;

class Days
{

    private $date;

    private $timezone;

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getUTCOffset()
    {
        return new Offset($this->date, $this->timezone);
    }

    public function getMonth(): string
    {
        return (new DateTime($this->date))->format('F');
    }

    public function getFebruaryDays(): int
    {
        $date = new DateTime($this->date);
        $time = mktime(0, 0, 0, 2, 1, $date->format('Y'));
        $february =  new DateTime('@'.$time);

        return intval($february->format('t'));
    }

    public function getDaysInMonth(): int
    {
        return (new DateTime($this->date))->format('t');
    }
}
