<?php
error_reporting(0);

$db = mysql_connect('localhost', 'mbilka', 'uBaDah6shoa0')
or die('Could not connect: ' . mysql_error());
mysql_select_db('mbilka_baza_projekt') or die('Could not select database');


session_start();
$me=$_SESSION['me']; 
