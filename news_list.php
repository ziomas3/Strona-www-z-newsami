<?php

include_once "baza.php";

$where = " (pokaz or  ((autor='$me') and '$me'<>'') or ('$_SESSION[rola]'>'1')) ";

if($id=intval($_GET['id']))
    $where.=" and id='$id' ";

if($autor=intval($_GET['autor']))
    $where.=" and autor='$autor' ";

if($kat=SQLite3::escapeString($_GET['kat']))
    $where.=" and kategoria='$kat' ";

if($ile=intval($_GET['ile']))
    $limit=" LIMIT $ile ";


if( $results = $db->query(
                   "SELECT id, tytul
                    FROM news
                    WHERE $where 
                    ORDER BY id desc
                    $limit
                    "))
{
    echo "<h2> $kat  </h2>";
    while ($row = $results->fetchArray()) 
        echo "<div class='wpis'><a href='#news_show.php?id=$row[id]'>$row[tytul]</a></div>";

}
