--TEST--
Svn::log() --revision ARG[:ARG] (depends on the Svn::checkout()) (repository url)
--FILE--
<?php

$url = 'file://' . dirname(__FILE__) . DIRECTORY_SEPARATOR . 'r' . DIRECTORY_SEPARATOR . 'renamed_test';
var_dump(Svn::log($url, SvnRevision::HEAD));
var_dump(Svn::log($url, SvnRevision::HEAD, 2));
var_dump(Svn::log($url, 2, SvnRevision::HEAD));
var_dump(Svn::log($url,4, 2));
var_dump(Svn::log($url, 4));
var_dump(Svn::log($url, 4, SvnRevision::INITIAL));
var_dump(Svn::log($url, 4, 0)); // use SvnRevision::INITIAL, not magic number. it is only a test

?>
--EXPECT--
array(0) {
}
array(2) {
  [0]=>
  array(4) {
    ["rev"]=>
    int(4)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(0) ""
    ["date"]=>
    string(27) "2008-01-25T17:39:35.470636Z"
  }
  [1]=>
  array(4) {
    ["rev"]=>
    int(2)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(7) "message"
    ["date"]=>
    string(27) "2008-01-25T17:38:14.748264Z"
  }
}
array(2) {
  [0]=>
  array(4) {
    ["rev"]=>
    int(2)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(7) "message"
    ["date"]=>
    string(27) "2008-01-25T17:38:14.748264Z"
  }
  [1]=>
  array(4) {
    ["rev"]=>
    int(4)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(0) ""
    ["date"]=>
    string(27) "2008-01-25T17:39:35.470636Z"
  }
}
array(2) {
  [0]=>
  array(4) {
    ["rev"]=>
    int(4)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(0) ""
    ["date"]=>
    string(27) "2008-01-25T17:39:35.470636Z"
  }
  [1]=>
  array(4) {
    ["rev"]=>
    int(2)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(7) "message"
    ["date"]=>
    string(27) "2008-01-25T17:38:14.748264Z"
  }
}
array(1) {
  [0]=>
  array(4) {
    ["rev"]=>
    int(4)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(0) ""
    ["date"]=>
    string(27) "2008-01-25T17:39:35.470636Z"
  }
}
array(3) {
  [0]=>
  array(4) {
    ["rev"]=>
    int(4)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(0) ""
    ["date"]=>
    string(27) "2008-01-25T17:39:35.470636Z"
  }
  [1]=>
  array(4) {
    ["rev"]=>
    int(2)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(7) "message"
    ["date"]=>
    string(27) "2008-01-25T17:38:14.748264Z"
  }
  [2]=>
  array(4) {
    ["rev"]=>
    int(1)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(0) ""
    ["date"]=>
    string(27) "2008-01-25T17:36:40.979851Z"
  }
}
array(3) {
  [0]=>
  array(4) {
    ["rev"]=>
    int(4)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(0) ""
    ["date"]=>
    string(27) "2008-01-25T17:39:35.470636Z"
  }
  [1]=>
  array(4) {
    ["rev"]=>
    int(2)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(7) "message"
    ["date"]=>
    string(27) "2008-01-25T17:38:14.748264Z"
  }
  [2]=>
  array(4) {
    ["rev"]=>
    int(1)
    ["author"]=>
    string(7) "Develar"
    ["msg"]=>
    string(0) ""
    ["date"]=>
    string(27) "2008-01-25T17:36:40.979851Z"
  }
}