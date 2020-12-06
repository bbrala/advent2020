<?php
require 'vendor/autoload.php';

$lines = \Bbrala\Advent\InputParser::parseExplode(file_get_contents('day-6-input.txt'));

$group = '';
$groupResults = [];
foreach ($lines as $line) {
  $group .= $line;

  if($line === ''){
    $characters = str_split($group);
    $groupResults[] = count(array_unique($characters));
    $group = '';
  }
}
if($group !== ''){
  $characters = str_split($group);
  $groupResults[] = count(array_unique($characters));
}

print_r($groupResults);
echo PHP_EOL . ' sum: ' . array_sum($groupResults) . PHP_EOL;


$group = '';
$groupResults = [];
$groupCounter = 0;
foreach ($lines as $line) {
  $group .= $line;

  if($line === ''){
    $characters = str_split($group);
    $arrayCountValues = array_count_values($characters);
    $groupResults[] = count(array_filter(
      $arrayCountValues, function($var) use ($groupCounter){
      return $groupCounter === $var;
    }));

    $group = '';
    $groupCounter = 0;
    continue;
  }
  $groupCounter++;
}
if($group !== ''){
  $characters = str_split($group);
  $arrayCountValues = array_count_values($characters);
  $groupResults[] = count(array_filter(
    $arrayCountValues, function($var) use ($groupCounter){
    return $groupCounter === $var;
  }));

}

echo PHP_EOL . ' sum: ' . array_sum($groupResults) . PHP_EOL;
