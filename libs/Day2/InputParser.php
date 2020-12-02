<?php
namespace Bbrala\Advent\Day2;

class InputParser {

  /**
   * @param $input
   *
   * @param string $factoryClass
   *
   * @return \Bbrala\Advent\Day2\Password[]
   */
  public static function parse($input, string $factoryClass){
    $passwords = [];

    $line = strtok($input, "\n");
    while ($line !== FALSE){
      [$validator, $password] = explode(': ', $line);
      $validator = $factoryClass::create($validator);
      $passwords[] = new Password($password, $validator);
      $line = strtok("\n");
    }
    return $passwords;
  }
}
