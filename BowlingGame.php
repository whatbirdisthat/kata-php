<?php

class BowlingGame {

  private $bowls = [];
  private $bowlCount = 0;

  function bowl($pins) {
    $this->bowls[$this->bowlCount] = $pins;
    $this->bowlCount++;
  }

  function isStrike($i) {
    return ($i < count($this->bowls)-3) && $this->bowls[$i] == 10;
  }

  function isSpare($i) {
    return $i > 0 && $this->bowls[$i] + $this->bowls[$i-1] == 10;
  }

  function score() {
    $theScore = 0;

    for ($i = 0; $i < count($this->bowls); $i++) {
      if ($this->isStrike($i)) {
        $theScore += $this->bowls[$i] + $this->bowls[$i+1] + $this->bowls[$i+2];
      } else if ($this->isSpare($i)) {
        $theScore += $this->bowls[$i] + $this->bowls[$i+1];
      } else {
        $theScore += $this->bowls[$i];
      }
    }

    return $theScore;
  }

}

?>
