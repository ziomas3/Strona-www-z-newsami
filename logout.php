<?php
session_start();
$_SESSION['me']='';
echo "<script>location='.'</script>";