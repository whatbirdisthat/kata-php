<?php

class BowlingGame {

  public $theScore = 0;

  function bowl($pins) {
    $this->theScore += $pins;
  }

  function score() {
    return $this->theScore;
  }

}

?>
