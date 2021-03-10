<?php

namespace App\ViewModel;

use App\Model\Days;
use App\Model\Month;
use App\Model\Offset;

class Date
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

    public function getUTCOffset(): Offset
    {
        return new Offset($this->date, $this->timezone);
    }

    public function getMonth(): Month
    {
        return new Month($this->date);
    }

    public function getFebruaryDays(): Days
    {
        return Days::inFebruary($this->date);
    }

    public function getDaysInMonth(): Days
    {
        return Days::inMonthOf($this->date);
    }
}
