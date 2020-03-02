<?php

include_once "baza.php";

$where = " ((pokaz) or (('$me'<>'' and autor='$me') or ('$_SESSION[rola]'>'1'))) ";

if($main=intval($_GET['main']))
    $where.=" and main ";

if($id=intval($_GET['id']))
    $where.=" and id='$id' ";

if($autor=intval($_GET['autor']))
    $where.=" and autor='$autor' ";

if($kat=SQLite3::escapeString($_GET['kat']))
    $where.=" and kategoria='$kat' ";

if($ile=intval($_GET['ile']))
    $limit=" LIMIT $ile ";

$results = $db->query("SELECT *
                       FROM news
                       WHERE $where
                       ORDER BY id desc 
		       $limit
		       ");


while ($row = $results->fetchArray()) {
echo 
"<a href='#news_show.php?id=$row[id]' style='color:black'>
<div class='news'id='news$row[id]'>
<img class='obrazek' src='$row[url]'>
<i class='kat'>$row[kategoria]</i>
<i class='date'>$row[data]</i>
<h3 class='tytul'>$row[tytul]</h3>
<div>$row[skrot]</div>
</div>
<a/>";

}

echo "<script>$('#right').load('news_list.php?id=$id&kat=$kat&autor=$autor')</script>";

