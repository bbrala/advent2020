<?php
namespace Bbrala\Advent\Day2;

class InputParser {

  /**
   * @param $input
   *
   * @return \Bbrala\Advent\Day2\Password[]
   */
  public static function parse($input){
    $passwords = [];

    $line = strtok($input, "\n");
    while ($line !== FALSE){
      [$validator, $password] = explode(': ', $line);
      $validator = PasswordValidatorFactory::create($validator);
      $passwords[] = new Password($password, $validator);
      $line = strtok("\n");
    }
    return $passwords;
  }
}
