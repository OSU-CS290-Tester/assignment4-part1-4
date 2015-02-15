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
if (array_key_exists('logout', $_GET)) {
    session_start();
    destroyMe();
}
session_start();
if (array_key_exists('username', $_POST) || array_key_exists('username', $_SESSION)) 
{
    
    if (array_key_exists('username', $_POST))
    {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['validStart'] = true;
    }
    
    if (!$_SESSION['validStart']) destroyMe();
    
    $username = $_SESSION['username'];
    
    $visits = $_SESSION[$username];
    
    if (empty($visits)) $visits = 0;
    
    $body = "<p>Hello $username you have visited this page $visits times before. Click <a href=\"content1.php?logout=true\">here</a> to logout.</p>";
    
    $body .= '<p><a href="content2.php">Link</a> to content2.</p>';
    
    $_SESSION[$username] = $visits + 1;
}
else
{
    session_destroy();
    $body = 'A username must be entered. Click <a href="login.php">here</a> to return to the login screen.';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>content1.php</title>
</head>
<body>
        <?php echo $body ?>
</body>
</html>