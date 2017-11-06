<?php
require "BowlingGame.php";
require "Assert.php";
require "TestRunner.php";

$tests = [
  "Reports Zero score on init" => function() {
    $game = new BowlingGame();
    Assert::Equal(0, $game->score());
  }
];

TestRunner::RunTests("Bowling Game Kata", $tests);
?>
