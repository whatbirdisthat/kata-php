<?php

class TestRunner {

  public static function RunTests($title, $tests, $setupFunc) {

    $startTime = microtime(true)*1000;

    $passed = 0;
    $failed = 0;

    print "$title\n\n";

    foreach ($tests as $testName => $test) {
      $testResult = "\033[32m\u{2713}\033[0m";
      $testMessage = "";
      try {
        $ObjectUnderTest = $setupFunc();
        $test($ObjectUnderTest);
        $passed++;
      } catch (Exception $r) {
        $failed++;
        $testResult = "\033[31m\u{2717}\033[0m";
        $testMessage = "(" . $r->getMessage() . ")";
      }
      print "$testResult - $testName $testMessage\n";
    }

    $duration = round((microtime(true)*1000) - $startTime, 2);
    print "\n$passed Passed, $failed Failed (${duration}ms)\n";

  }
}

?>
