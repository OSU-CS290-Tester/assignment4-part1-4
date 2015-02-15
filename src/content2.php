<?php
function destroyMe() {
    //session destroy code: http://php.net/manual/en/function.session-destroy.php
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    //end of session destroy code
    session_destroy();
    header("Location: login.php");
    exit();
}
session_start();
if (array_key_exists('username', $_SESSION)) 
{
    if (!$_SESSION['validStart']) destroyMe();
}
else
{
    destroyMe();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CS290 - content2.php</title>
</head>
<body>
    <p><a href="content1.php">Link</a> to content1.</p>
</body>
</html>