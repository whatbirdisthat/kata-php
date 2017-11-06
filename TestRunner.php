<?php

class TestRunner {

  public static function RunTests($title, $tests) {

    $passed = 0;
    $failed = 0;

    print "$title\n\n";

    foreach ($tests as $testName => $test) {
      $testResult = "\033[32m\u{2713}\033[0m";
      $testMessage = "";
      try {
        $test();
        $passed++;
      } catch (Exception $r) {
        $failed++;
        $testResult = "\033[31m\u{2717}\033[0m";
        $testMessage = "(" . $r->getMessage() . ")";
      }
      print "$testResult - $testName $testMessage\n";
    }

    print "\n$passed Passed, $failed Failed\n";

  }
}

?>
