<?php
session_start();
// Destroying All the user login Sessions
if(session_destroy())
{
// Redirecting To the admin login page
echo "<script type='text/javascript'>
window.location = '/map/admin-login.php'
</script>";
}
?>
