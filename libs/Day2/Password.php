<?php


namespace Bbrala\Advent\Day2;


class Password {

  private string $password;

  /**
   * @var \Bbrala\Advent\Day2\PasswordValidatorInterface
   */
  private PasswordValidatorInterface $validator;

  /**
   * Password constructor.
   *
   * @param string $password
   * @param \Bbrala\Advent\Day2\PasswordValidatorInterface $validator
   */
  public function __construct(string $password, PasswordValidatorInterface $validator) {
    $this->password = $password;
    $this->validator = $validator;
  }

  public function valid(){
    return $this->validator->validate($this->password);
  }
}
