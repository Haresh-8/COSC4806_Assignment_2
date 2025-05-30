<?php
session_start();
require_once('user.php');

 
if (!isset($_SESSION['authenticated'])) {
    echo"<pre> Hey, Connect to us just by clicking...";
    echo"</pre>";
    echo "<a href='login.php'>Login</a> or <a href='register.php'>Register</a>";
    exit();
}

$user = new User();
$user_list = $user->get_all_users();

echo "<pre>Welcome,{$_SESSION['username']}\n";
echo "</pre>";
echo "Today's date: ".date("l, F j, Y");
echo "</pre>";
print_r($user_list);
echo "</pre>";

?>
<br><br>
<a href='logout.php'>Logout</a>