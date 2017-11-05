<?php
require "BowlingGame.php";

print "Bowling Game Kata - Feature Report\n";

function testZeroScoreOnInit() {
  $game = new BowlingGame();
  assert(0 == $game->score());
}

testZeroScoreOnInit();

?>
