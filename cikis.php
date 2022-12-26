<?php


session_start();

unset($_SESSION['uid']);
unset($_SESSION['username']);
session_unset();
session_destroy();

echo '<script>window.location.href="auth/auth-login"</script>';

?>