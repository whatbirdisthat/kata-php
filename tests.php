<?php
require "BowlingGame.php";
require "Assert.php";

print "Bowling Game Kata - Feature Report\n";

$tests = [
  "Zero Score on init" => function() {
    $game = new BowlingGame();
    Assert::Equal(1, $game->score());
  }
];

print "\n";

foreach ($tests as $testName => $test) {
  $testResult = "\033[32m\u{2713}\033[0m";
  $testMessage = "";
  try {
    $test();
  } catch (Exception $r) {
    $testResult = "\033[31m\u{2717}\033[0m";
    $testMessage = "(" . $r->getMessage() . ")";
  }
  print "$testResult - $testName $testMessage";
}

print "\n\n";

?>
