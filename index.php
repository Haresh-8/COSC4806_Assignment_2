<?php
session_start();
require_once('user.php');

 
if (!isset($_SESSION['authenticated'])) {
    echo"<pre> Hey, Are you looking for something... Just click on..";
    echo"</pre>";
    echo "<pre> 
    Existing User..<a href='login.php'>Login</a>
    </prev>
    New User <a href='register.php'>Register</a>";
    exit();
}

$user = new User();
$user_list = $user->get_all_users();

echo "<pre>Welcome,{$_SESSION['username']}\n";
echo "</pre>";
echo "Today's date is: ".date("l, F j, Y");
echo "</pre>";
print_r($user_list);
echo "</pre>";

?>
<br><br>
<a href='logout.php'>Logout</a>