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
      yield $line;
      $line = strtok("\n");
    }
  }
}
