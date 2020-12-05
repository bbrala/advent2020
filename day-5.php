<?php

use Bbrala\Advent\InputParser;

require 'vendor/autoload.php';

$input = ['FBFBBFFRLR'];

class Seat {

  private $rowMin = 0;

  private $rowMax = 127;

  private $seatMin = 0;

  private $seatMax = 7;


  /**
   * RowCalculator constructor.
   */
  public function __construct($map) {
    $this->map = $map;
  }

  public function parseSeat() {
    $characters = strlen($this->map);
    $i = 0;

    while ($i < $characters) {
      switch ($this->map[$i]) {
        case "F":
          $this->rowMax -= $this->getRowModifier();
          break;
        case "B":
          $this->rowMin += $this->getRowModifier();
          break;
        case "L":
          $this->seatMax -= $this->getSeatModifier();
          break;
        case "R":
          $this->seatMin += $this->getSeatModifier();
          break;
      }
      $i++;
    }
  }

  public function id() {
    if ($this->seatMax !== $this->seatMin || $this->rowMax !== $this->rowMin) {
      $this->parseSeat();
    }

    return ($this->rowMax * 8) + $this->seatMax;
  }

  /**
   * @return float|int
   */
  protected function getRowModifier() {
    $rowRange = $this->rowMax - $this->rowMin + 1;
    return ($rowRange / 2);
  }

  /**
   * @return float|int
   */
  protected function getSeatModifier() {
    $seatRange = $this->seatMax - $this->seatMin + 1;
    return ($seatRange / 2);
  }

}

$rows = InputParser::parse(file_get_contents('day-5-input.txt'));
$results = [];
foreach ($rows as $pattern) {
  $seat = new Seat($pattern);
  $results[] = $seat->id();
}

echo PHP_EOL . "Max seat id: " . max($results) . ' min ' . min($results);
echo PHP_EOL;
sort($results);

for ($i = 1; $i < count($results); $i++) {
  if (!isset($results[$i + 2])) {
    break;
  }

  $current = $results[$i];
  $next = $results[$i + 1];
  if ($next - $current == 2) {
    echo PHP_EOL . "Found seat between $current and $next";
    echo PHP_EOL;
  }
}
