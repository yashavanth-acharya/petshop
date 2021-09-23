<?php
session_start();
session_destroy();
header("/petshop_project/");
echo "<script>window.location.href='/petshop_project/'</script>";
?>