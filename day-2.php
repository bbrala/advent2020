<?php

use Bbrala\Advent\Day2\InputParser;
use Bbrala\Advent\Day2\PasswordValidatorFactory;
use Bbrala\Advent\Day2\WrongPasswordValidatorFactory;

require 'vendor/autoload.php';
$passwordList = InputParser::parse(file_get_contents('day-2-input.txt'), WrongPasswordValidatorFactory::class);

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


echo PHP_EOL . " ----- part 2";

require 'vendor/autoload.php';
$passwordList = InputParser::parse(file_get_contents('day-2-input.txt'), PasswordValidatorFactory::class);

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
