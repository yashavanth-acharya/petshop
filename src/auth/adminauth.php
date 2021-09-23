<?php
session_start();
if(!$_SESSION['userid'] or $_SESSION['role']!="admin"){
    echo "<script>window.location.href='/petshop_project/'</script>";
}
?>