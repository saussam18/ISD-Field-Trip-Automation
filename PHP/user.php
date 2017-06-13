<?php

class user {
  private $accessName;
  private $accessType;
  public function  __construct($name, $type) {
    $this->accessName = $name;
    $this->accessType = $type;
  }

  public function getName(){
    return $this->accessName;
  }
  public function getType(){
    return $this->accessType;
  }

}
?>
