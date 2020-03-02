<?php

include_once "baza.php";

$id=intval($_GET['id']);
$results = $db->query("SELECT * FROM user where id='$id'");

$role=array('Niezalogowany','Bloger','Administrator');

while ($row = $results->fetchArray()) 
{
    echo "<div class='user'>";
    if($id==$me or $_SESSION[rola]>1)
      echo "<a class='edit' href='#user_edit.php?id=$row[id]'>Edit</a>";
    echo "<h1>$row[imie] $row[nazwisko] </h1>";
    echo "<table>";
    echo "<tr><th>Login:</th><td>$row[login]</td></tr>";
    echo "<tr><th>Email:</th><td>$row[email]</td></tr>";
    echo "<tr><th>Imię:</th><td>$row[imie]</td></tr>";
    echo "<tr><th>Nazwisko:</th><td> $row[nazwisko]</td></tr>";
    $rola=$role[$row['rola']];
    echo "<tr><th>Rola:</th><td>$rola</td></tr>";
    echo "</table>";
    echo "</div>";
    echo "<script>$('#right').load('news_list.php?autor=$row[id]')</script>";
}

?>
<script>
$("#left").load("user_list.php");
</script>


