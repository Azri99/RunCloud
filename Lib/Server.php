<?php
class Server
{
    public $name;
    public $ipAddress;
    

    public function __construct() {
    } 
    
    public function getServerInfo()
    {
        return "$this->name [$this->ipAddress]";
    }

}
