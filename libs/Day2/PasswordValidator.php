<?php

namespace Bbrala\Advent\Day2;

class PasswordValidator {

  private $letter;

  private $min;

  private $max;

  /**
   * PasswordValidator constructor.
   *
   * @param string $letter
   * @param int $min
   * @param int $max
   */
  public function __construct(string $letter, int $min, int $max) {
    $this->letter = $letter;
    $this->min = $min;
    $this->max = $max;
  }

  public function validate(string $password){
    $letterOccurence = substr_count($password, $this->letter);
    return ($letterOccurence >= $this->min && $letterOccurence <= $this->max);
  }
}
