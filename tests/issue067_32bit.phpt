--TEST--
Issue #67 (uint64_t)
--SKIPIF--
<?php
if (!extension_loaded("msgpack")) {
    die("skip");
}
if (PHP_INT_SIZE !== 4)
    die("skip this test is for 32-bit platforms only");
?>
--FILE--
<?php
var_dump(msgpack_unpack("\xcf"."\x7f\xff\xff\xff"."\xff\xff\xff\xff"));
var_dump(msgpack_unpack("\xcf"."\x80\x00\x00\x00"."\x00\x00\x00\x00"));
var_dump(msgpack_unpack("\xcf"."\xff\xff\xff\xff"."\xff\xff\xff\xff"));
?>
OK
--EXPECT--
string(19) "9223372036854775807"
string(19) "9223372036854775808"
string(20) "18446744073709551615"
OK
