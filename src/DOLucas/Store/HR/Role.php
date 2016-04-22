<?php

namespace DOLucas\Store\HR;

class Role
{

    private $roles = [
        'developer' => 'DOLucas\Store\HR\TenOrTwentyPercent',
        'dba'       => 'DOLucas\Store\HR\FifteenOrTwentyFivePercent',
        'tester'    => 'DOLucas\Store\HR\FifteenOrTwentyFivePercent'
    ];
    private $rule;

    public function __construct($rule)
    {
        if (array_key_exists($rule, $this->roles)) {
            $this->rule = $this->roles[$rule];
        } else {
            throw new \Exception('Invalid role');
        }
    }

    public function getRule()
    {
        return new $this->rule();
    }
}