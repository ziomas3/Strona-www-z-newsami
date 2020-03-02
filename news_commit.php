<?php
include_once "baza.php";

// Jeśli były przesłane dane i użytkownik jest zalogowany
if($_POST and $_SESSION['me'])
{   
    // Przygotowanie przesłanych danych do zapisu do bazy
    foreach($_POST as $x=>$y)
        $r[$x]=SQLite3::escapeString ($y);

    $id=intval($_POST['id']);

    if(empty($id)) //Dodaj nowy artykuł
    {
        $db->query("insert into news(autor,tytul,data,kategoria,skrot,tekst,url) 
                    values('$_SESSION[me]','$r[tytul]',datetime('now'),'$r[kategoria]','$r[skrot]','$r[tekst]','$r[url]')");

        $id=$db->lastInsertRowID ();
    }

    if($id>0) // Zapisz zmiany po edycji
    {
        $db->query("update news set
          /*         autor='$_SESSION[me]', */
                   kategoria='$r[kategoria]',
                   tytul='$r[tytul]',
                   aktualizacja=datetime('now'),
                   skrot='$r[skrot]',
                   tekst='$r[tekst]',
                   pokaz='$r[pokaz]',
                   url='$r[url]',
                   main='$r[main]'
                   where id='$id'");
    }
    // Pokaż jak wygląda artykuł po edycji
    echo "<script> location='#news_show.php?id=$id'</script>";
}