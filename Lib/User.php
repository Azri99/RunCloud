<?php
//Interface
class User
{
    public $name;
    
    private $planSubscribe; 
    private $connectedServer;

    public function __construct() {
        $this->planSubscribe = NULL;
        $this->connectedServer = array();
    }

    public function subscribe($planSubscribe)
    {
        $this->planSubscribe = $planSubscribe;
    }

    public function unsubscribe()
    {
        $unsub = $this->planSubscribe->getPlan();
        print "Action: Canseling Subscription to $unsub\n";
        $this->planSubscribe->setPlan(NULL);
        $this->connectedServer = array();
        print "You have succesfully unsubscribed to $unsub\n";
        print "Thank you for using RunCloud\n";
    }

    public function connectServer($connectedServer)
    {
        try {
            print "Action: Connecting To $connectedServer->name\n";
            
            if(!$this->planSubscribe->getPlan())
                throw new Exception("User is not Subscribeto Any Plan !");
            
            if($this->planSubscribe->getPlan() == "Basic Plan"
            && count($this->connectedServer) == 1)
                throw new Exception("User Exceeded Server Limit allowed for Basic Plan !");
            
            $this->connectedServer[] = $connectedServer;
            
            print "Action=> $connectedServer->name is connected !\n";
            
            $this->print();
        } catch (Exception $error) {
            print $this->errorMessage($error->getMessage());
        }
    }

    public function print()
    {
        
        print "+" . str_pad("", 20, "-") . "+" . str_pad("", 20, "-") . "\n";
        print "|" . str_pad("User Name", 20, " ") . "|" . str_pad($this->name, 20, " ") . "\n";
        print "+" . str_pad("", 20, "-") . "+" . str_pad("", 20, "-") . "\n";
        print "|" . str_pad("Current Plan", 20, " ") . "|" . str_pad($this->planSubscribe->getPlan(), 20, " ") . "\n";
        print "+" . str_pad("", 20, "-") . "+" . str_pad("", 20, "-") . "\n";
        print "|" . str_pad("Connected Server", 20, " ") . "|" . str_pad(implode(' , ', array_map(fn($e) => $e->getServerInfo(), $this->connectedServer)), 20, " ") . "\n";
        print "+" . str_pad("", 20, "-") . "+" . str_pad("", 20, "-") . "\n";

    }
    public function errorMessage($errorMessage)
    {
        return "Error => $errorMessage\n";
    }
}
