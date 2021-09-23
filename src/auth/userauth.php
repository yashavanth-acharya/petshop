<?php
session_start();
if(!$_SESSION['userid'] or $_SESSION['role']!="user"){
    echo "<script>window.location.href='/petshop_project/src/user/login.php'</script>";
}
?>