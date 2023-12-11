<?php
// Switch
$color = "red";
switch ($color) {
    case "red":
        echo "Red color";
        break;
    case "blue":
        echo "Blue color";
        break;
    default:
        echo "No color selected";
}

// While Loop
$i = 0;
while ($i < 5) {
    echo $i;
    $i++;
}

// Do-While Loop
do {
    echo $i;
    $i++;
} while ($i < 10);

// For Loop
for ($j = 0; $j < 5; $j++) {
    echo $j;
}

// Foreach Loop
$colors = array("red", "green", "blue");
foreach ($colors as $value) {
    echo $value;
}
?>
