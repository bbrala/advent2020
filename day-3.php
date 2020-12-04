<?php
require 'vendor/autoload.php';

class TreePattern {
  /**
   * TreePattern constructor.
   */
  public function __construct($pattern) {
    $this->pattern = $pattern;
  }

  public function hasTree($index){
    // Wrap the index acount the length of the string
    $indexTranslated = $index % strlen($this->pattern);
    return $this->pattern[$indexTranslated] === '#';
  }
}

class TreeRowWalker {

  /** @var \TreePattern[]  */
  private array $patterns = [];

  /**
   * TreeRowWalker constructor.
   */
  public function __construct() {
    $treeRows = \Bbrala\Advent\InputParser::parse(file_get_contents('day-3-input.txt'));
    foreach($treeRows as $pattern){
      $this->patterns[] = new TreePattern($pattern);
    }
  }

  public function count(int $right, int $down){
    $row = 0;
    $column = $right;
    $treeCounter = 0;
    $patternCount = count($this->patterns);
    while($row < $patternCount){
      $row += $down;
      if($row < $patternCount && $this->patterns[$row]->hasTree($column)) {
        $treeCounter++;
      }
      $column += $right;
    }
    return $treeCounter;
  }
}

$walker = new TreeRowWalker();

// Part 1
$result = $walker->count(3, 1);
echo PHP_EOL . "Found: $result trees" . PHP_EOL;

// Part 2
$result = $walker->count(1, 1);
$result *= $walker->count(3, 1);
$result *= $walker->count(5, 1);
$result *= $walker->count(7, 1);
$result *= $walker->count(1, 2);

echo PHP_EOL . "Found: $result" . PHP_EOL;
