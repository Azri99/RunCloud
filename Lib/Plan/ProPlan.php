<?php
class ProPlan extends Plan
{
    public function __construct() {
        print "Subscribe To Pro Plan\n";
        $this->setPlan('Pro Plan');
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
