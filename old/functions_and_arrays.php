<?php
function greet($name) {
    return "Hello " . $name;
}

echo greet("John") . "\n";

$numbers = array(1, 2, 3, 4, 5);
foreach ($numbers as $number) {
    echo $number;
}
?>
