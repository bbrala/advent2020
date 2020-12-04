<?php

class TreePattern {
  /**
   * TreePattern constructor.
   */
  public function __construct($pattern) {
    $this->pattern = $pattern;
  }

  public function hasTree($index){
    $indexTranslated = strlen($this->pattern) % $index;
    return $this->pattern[$indexTranslated] === '#';
  }
}

class TreeRowWalker {

  /** @var \TreePattern[]  */
  private array $patterns = [];

  /**
   * TreeRowWalker constructor.
   */
  public function __construct(array $rows) {
    $this->rows = $rows;

    foreach($rows as $pattern){
      $this->patterns[] = new TreePattern($pattern);
    }
  }

  public function count(int $right, int $down){
    $row = 0;
    $treeCounter = 0;
    $patternCount = count($this->patterns);
    while($row < $patternCount){
      $row += $down;
      if($row < $patternCount) {
        if($this->patterns[$row]->hasTree($right)){
          $treeCounter++;
        }
      }
    }
    return $treeCounter;
  }
}


$treeRows = [
  '..##.......',
  '#...#...#..',
  '.#....#..#.',
  '..#.#...#.#',
  '.#...##..#.',
  '..#.##.....',
  '.#.#.#....#',
  '.#........#',
  '#.##...#...',
  '#...##....#',
  '.#..#...#.#',
];

$walker = new TreeRowWalker($treeRows);

$result = $walker->count(3, 1);

echo PHP_EOL . "Found: $result trees";
