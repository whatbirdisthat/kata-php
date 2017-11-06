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
  },
  "Can report two spares in a full game" => function($game) {
    $gameBowls =[3,5,4,6,2,7,5,3,1,1,6,1,0,4,0,0,3,6,5,0];
    foreach ($gameBowls as $b) {
      $game->bowl($b);
    }
    Assert::Equal(64, $game->score());
  },
  "Can report one strike and some one-pin bowls" => function($game) {
    $gameBowls = [0,1,10,2,3,5,1,1,1,1,1,1,1,1,1,1,1,1,1];
    foreach ($gameBowls as $b) {
      $game->bowl($b);
    }
    Assert::Equal(39, $game->score());
  },
  "Can report a perfect game" => function($game) {
    bowlMany($game, 10, 12);
    Assert::Equal(300, $game->score());
  }

];

TestRunner::RunTests("Bowling Game Kata", $tests, function() { return new BowlingGame(); });
?>
