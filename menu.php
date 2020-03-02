<div id='menu'>

<a href='#news_show.php?main=1'>Strona główna</a>
<a href='#news_short.php?ile=10'>Najnowsze</a>

<a href='#news_short.php?kat=Smartfony'>Smartfony</a>
<a href='#news_short.php?kat=Smartwatche'>Smartwatche</a>
<a href='#news_short.php?kat=Trackery_fitnesowe'>Trackery fitnesowe </a>


<?php
session_start();
if(empty($_SESSION['me']))
{
    echo "<a href='#login.php'>Zaloguj się</a> ";
    echo "<a href='#user_edit.php'>Zarejestruj się</a> ";
}
else
{
    echo "<a href='#news_edit.php'>Nowy wpis</a> ";
    echo "<a href='#logout.php'>Wyloguj</a> ";
}
?>

</div>

