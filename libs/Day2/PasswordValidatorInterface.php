<?php

namespace Bbrala\Advent\Day2;

interface PasswordValidatorInterface {

  public function validate(string $password) : bool;

}
