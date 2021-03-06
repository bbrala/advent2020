<?php


namespace Bbrala\Advent\Day2;


class PasswordValidatorFactory {

  public static array $validatorCache = [];

  // 4-7 z
  public static function create(string $string){
    if(isset(self::$validatorCache[$string])){
      return self::$validatorCache[$string];
    }

    [$range, $letter] = explode(' ', $string);
    [$firstPosition, $secondPosition] = explode('-', $range);
    $passwordValidator = new PasswordValidator($letter, $firstPosition, $secondPosition);
    self::$validatorCache[$string] = $passwordValidator;

    return $passwordValidator;
  }
}
