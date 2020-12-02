<?php


namespace Bbrala\Advent\Day2;


class Password {

  private $password;

  /**
   * @var \Bbrala\Advent\Day2\PasswordValidator
   */
  private PasswordValidator $validator;

  /**
   * Password constructor.
   */
  public function __construct($password, PasswordValidator $validator) {
    $this->password = $password;
    $this->validator = $validator;
  }

  public function valid(){
    return $this->validator->validate($this->password);
  }
}
