<?php

class BasicPlan extends Plan
{

    public function __construct() {
        print "Subscribe To Basic Plan\n";
        $this->setPlan('Basic Plan');
    }
    
    public function setPlan($name)
    {
        $this->name = $name;
    }

    public function getPlan()
    {
        return $this->name;
    }
}
