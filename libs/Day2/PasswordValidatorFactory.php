<?php


namespace Bbrala\Advent\Day2;


class PasswordValidatorFactory {
  static $validatorCache = [];

  // 4-7 z
  public static function create(string $string){
    if(isset(self::$validatorCache[$string])){
      return self::$validatorCache[$string];
    }

    [$range, $letter] = explode(' ', $string);
    [$min, $max] = explode('-', $range);
    $passwordValidator = new PasswordValidator($letter, $min, $max);
    self::$validatorCache[$string] = $passwordValidator;

    return $passwordValidator;
  }
}
