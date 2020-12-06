<?php
namespace Bbrala\Advent;

class InputParser {

  /**
   * @param $input
   *
   * @return array
   */
  public static function parse($input){
    $line = strtok($input, "\n");
    while ($line !== FALSE){
      var_dump($line);
      yield $line;
      $line = strtok("\n");
    }
  }
  /**
   * @param $input
   *
   * @return array
   */
  public static function parseExplode($input){
    return explode("\n", $input);
  }
}
