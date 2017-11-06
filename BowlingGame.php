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

    for ($i = 0; $i < count($this->bowls); $i++) {
      if (($i < count($this->bowls)-1) && $this->bowls[$i] == 10) {
        $theScore += $this->bowls[$i] + $this->bowls[$i+1] + $this->bowls[$i+2];
      } else if ($i > 0 && $this->bowls[$i] + $this->bowls[$i-1] == 10) {
        $theScore += $this->bowls[$i] + $this->bowls[$i+1];
      } else {
        $theScore += $this->bowls[$i];
      }
    }

    return $theScore;
  }

}

?>
