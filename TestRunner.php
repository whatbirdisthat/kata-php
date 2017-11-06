<?php

class TestRunner {

  public static function RunTests($title, $tests) {

    print "$title\n\n";

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

  }
}

?>
