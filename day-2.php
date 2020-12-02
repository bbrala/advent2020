<?php
require 'vendor/autoload.php';
$passwordList = \Bbrala\Advent\Day2\InputParser::parse(file_get_contents('day-2-input.txt'));

$i = count($passwordList);

$validPasswords = 0;
$invalidPasswords = 0;

while($i--){
  if($passwordList[$i]->valid()){
    $validPasswords++;
  } else {
    $invalidPasswords++;
  }
}
echo PHP_EOL . "We have " . ($invalidPasswords+$validPasswords) . " passwords where $validPasswords are valid and $invalidPasswords as invalid.";
