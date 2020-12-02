<?php

namespace Bbrala\Advent\Day2;

class PasswordValidator implements PasswordValidatorInterface {

  private string $letter;

  private int $firstPosition;

  private int $secondPosition;

  /**
   * PasswordValidator constructor.
   *
   * @param string $letter
   * @param int $firstPosition
   * @param int $secondPosition
   */
  public function __construct(string $letter, int $firstPosition, int $secondPosition) {
    $this->letter = $letter;
    $this->firstPosition = $firstPosition;
    $this->secondPosition = $secondPosition;
  }

  public function validate(string $password) : bool {
    $counter = 0;
    if($password[$this->firstPosition-1] === $this->letter) {
      $counter++;
    }
    if($password[$this->secondPosition-1] === $this->letter) {
      $counter++;
    }
    return $counter === 1;
  }
}
