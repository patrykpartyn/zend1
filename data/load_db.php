<?php
$db = new PDO('sqlite:' . realpath(__DIR__) . '/zend.db');
$fh = fopen(__DIR__ . '/schema1.sql', 'r');
while ($line = fread($fh, 4096)) {
    $db->exec($line);
}
fclose($fh);