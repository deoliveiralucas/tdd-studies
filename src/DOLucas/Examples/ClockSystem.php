<?php

namespace DOLucas\Examples;

use DOLucas\Examples\ClockInterface;
use \DateTime;

class ClockSystem implements ClockInterface
{

    public function today()
    {
        return DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
    }
}