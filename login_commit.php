<?php

include_once "baza.php";

if($_POST)
{
    // Przygotowanie przesłanych danych do wyszukania w bazie
    foreach($_POST as $x=>$y)
        $r[$x]=SQLite3::escapeString ($y);
    
    // Wyszukaj osoby o takim loginie lub mailu oraz haśle
    $result =  $db->query(
               "SELECT * 		
               FROM  user 
			   WHERE  (login='$r[login]' or email='$r[login]')
                      AND haslo='$r[haslo]'
			 ");

    if($row= $result->fetchArray()) // znaleziono login i hasło
    {
        $_SESSION['me']=$row['id'];     // zapamiętaj w sesji moje id
        $_SESSION['rola']=$row['rola']; // oraz moją rolę
        
        // Pokaż moje dane
        echo "<script> location='#user_show.php?id=$row[id]';</script>";
    }
    else   // powrót na stronę logowania z wymuszonym odświeżeniem 
        echo "<script> location='#login.php?",date('h-i-s'),"'</script>";
}