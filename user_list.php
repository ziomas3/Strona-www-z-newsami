<?php

include_once "baza.php";

$results = $db->query("SELECT *
                       FROM user
                       ORDER BY nazwisko,imie
                       LIMIT 200"); //użytkownicy alfabetycznie

echo "<h2>Autorzy</h2>";

while ($row = $results->fetchArray()) //generuj listę odnośników
{    echo "<div class='user'>";

     if($me and ($me==$row['id'] or $_SESSION['rola']>1))
        echo "<a style='position:absolute;right:0' href='#user_show.php?id=$row[id]'>(e)</a>";
     echo "<a href='#news_short.php?autor=$row[id]'>$row[imie] $row[nazwisko]</a>";

    echo "</div>";
}
