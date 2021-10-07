<?php

abstract class Plan {
      protected $name;

      abstract public function setPlan($name);
      abstract public function getPlan();
}