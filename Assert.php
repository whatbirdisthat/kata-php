<?php

class Assert {
  static public function Equal($expected, $actual) {
    if ($expected !== $actual) {
      throw new Exception("Expected $expected, Actual $actual");
    }
  }
}

?>
