<?php
require "BowlingGame.php";
require "Assert.php";
require "TestRunner.php";

$tests = [
  "Reports Zero score on init" => function() {
    $game = new BowlingGame();
    Assert::Equal(0, $game->score());
  },
  "Reports Gutter Game as 0" => function() {
    $game = new BowlingGame();
    for ($i = 0; $i < 20; $i++) {
      $game->bowl(0);
    }
    Assert::Equal(0, $game->score());
  },
  "Reports single pin game as 1" => function() {
    $game = new BowlingGame();
    $game->bowl(1);
    Assert::Equal(1, $game->score());
  }
];

TestRunner::RunTests("Bowling Game Kata", $tests);
?>
