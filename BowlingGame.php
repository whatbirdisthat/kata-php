<?php

class BowlingGame {

  private $bowls = [];
  private $bowlCount = 0;

  function bowl($pins) {
    $this->bowls[$this->bowlCount] = $pins;
    $this->bowlCount++;
  }

  function score() {
    $theScore = 0;
    foreach ($this->bowls as $bowl) {
      $theScore += $bowl;
    }
    return $theScore;
  }

}

?>
