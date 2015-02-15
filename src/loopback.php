<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>loopback.php</title>
</head>
<body>
<?php
function processRequest($myData) {
    $returnArray['Type'] = $_SERVER['REQUEST_METHOD'];
    
    $parametersArray = array();
    foreach ($myData as $key => $value) {
        $parametersArray[$key] = $value;
    }
    if (empty($parametersArray)) $parametersArray = 'null';
    $returnArray['Parameters'] = $parametersArray;
    
    return json_encode($returnArray);
}
    if ($_GET) echo processRequest($_GET);
    elseif ($_POST) echo processRequest($_POST);
    else echo json_encode(array('error' => 'no GET or POST found'));
?>
</body>
</html>