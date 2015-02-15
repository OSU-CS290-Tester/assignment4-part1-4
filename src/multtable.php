<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Multtable.php</title>
</head>
<body>
<?php
$valid = true;
$minmulticand = (int)$_GET['min-multiplicand'];
$maxmulticand = (int)$_GET['max-multiplicand'];
$minmultiplier = (int)$_GET['min-multiplier'];
$maxmultiplier = (int)$_GET['max-multiplier'];

// check to make sure min < max
if ($minmultiplier > $maxmultiplier) {
    $valid = false;
    echo '<p>Minimum multiplier larger than maximum.</p>';
}
if ($minmulticand > $maxmulticand) {
    $valid = false;
    echo '<p>Minimum multiplicand larger than maximum.</p>';
}

// check to make sure they are integers
if ( !is_integer($minmulticand) ) {
    $valid = false;
    echo '<p>min-multiplicand must be an integer.</p>';
}
if ( !is_integer($maxmulticand) ) {
    $valid = false;
    echo '<p>max-multiplicand must be an integer.</p>';
}
if ( !is_integer($minmultiplier) ) {
    $valid = false;
    echo '<p>min-multiplier must be an integer.</p>';
}
if ( !is_integer($maxmultiplier) ) {
    $valid = false;
    echo '<p>max-multiplier must be an integer.</p>';
}

// checks to make sure they are not empty
if ( (empty($minmulticand) && $minmulticand !== 0) || !array_key_exists('min-multiplicand', $_GET)) {
    $valid = false;
    echo '<p>Missing parameter min-multiplicand.</p>';
}
if ( (empty($maxmulticand) && $maxmulticand !== 0) || !array_key_exists('max-multiplicand', $_GET) ) {
    $valid = false;
    echo '<p>Missing parameter max-multiplicand.</p>';
}
if ( (empty($minmultiplier) && $minmultiplier !== 0) || !array_key_exists('min-multiplier', $_GET) ) {
    $valid = false;
    echo '<p>Missing parameter min-multiplier.</p>';
}
if ( (empty($maxmultiplier) && $maxmultiplier !== 0) || !array_key_exists('max-multiplier', $_GET) ) {
    $valid = false;
    echo '<p>Missing parameter max-multiplier.</p>';
}

// all conditions met
if ($valid)
{
    echo '<table>';
    $headerRow = true;
    for ($row = 0; $row < $maxmulticand - $minmulticand + 2; ++$row) {
        if ($headerRow) {
            echo '<tr><td>&nbsp;</td>';
            $multi2 = $minmulticand - 1;
        } else {
            echo '<tr><td>' . $multi2 . '</td>';
        }
        $multi1 = $minmultiplier;
        for ($col = 1; $col < $maxmultiplier - $minmulti + 2; ++$col) {
            if ($headerRow) {
                echo '<th>' . $multi1 . '</th>';
            } else {
                echo '<td>' . $multi1 * $multi2 . '</td>';
            }
            ++$multi1;
        }
        echo '</tr>';
        if ($headerRow) $headerRow = false;
        ++$multi2;
    }
    echo '</table>';
}
?>

</body>
</html>