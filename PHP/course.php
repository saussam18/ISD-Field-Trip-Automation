<?php

class course {

  private $classname;
  private $users = 0;
  private $user;

  public function  __construct($name, $user) {
    $this->classname = $name;
    $this->user = $user;
  }
  public function getName(){
    return $this ->classname;
  }
  public function getUsers(){
    return $this->users;
  }
  public function getClasscode(){
    return $this->classcode;
  }
  public function getUser(){
      return $this->user;
  }
}
?>
