<?php
require "BowlingGame.php";
require "Assert.php";
require "TestRunner.php";

function bowlMany($game, $pins, $count) {
  $i = -1;
  while (++$i < $count) {
    $game->bowl($pins);
  }
}

$tests = [
  "Can report Zero score on init" => function($game) {
    Assert::Equal(0, $game->score());
  },
  "Can report Gutter Game as 0 points" => function($game) {
    bowlMany($game, 0, 20);
    Assert::Equal(0, $game->score());
  },
  "Can Report a single pin game as 1 point" => function($game) {
    $game->bowl(1);
    Assert::Equal(1, $game->score());
  },
  "Can report a game of ones as 20 points" => function($game) {
    bowlMany($game, 1, 20);
    Assert::Equal(20, $game->score());
  },
  "Can report a spare" => function($game) {
    $game->bowl(6);
    $game->bowl(4);
    $game->bowl(3);
    bowlMany($game, 0, 17);
    Assert::Equal(16, $game->score());
  }

];

TestRunner::RunTests("Bowling Game Kata", $tests, function() { return new BowlingGame(); });
?>
