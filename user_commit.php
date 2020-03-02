<?php
include_once "baza.php";

if($_POST and ($_SESSION['me'] or $_SESSION['rola']>1 or empty($_POST['id'])))
{
    // Przygotowanie przesłanych danych do zapisu do bazy
    foreach($_POST as $x=>$y)
        $r[$x]=SQLite3::escapeString ($y);

    $id=intval($_POST['id']);

    if(empty($id)) //Zarejestruj
    {
        $db->query("insert into user(login,email,imie,nazwisko,haslo,rola,token) 
                    values('$r[login]','$r[email]','$r[imie]','$r[nazwisko]','$r[haslo]','1','$r[token]')");

        $id=$db->lastInsertRowID ();
    }
    else // Zapis zmian po edycji 
    {   if($_SESSION['rola']>1 and $me!= $_POST['id']) 
            $setrole=",rola='$r[rola]'" ;
        $db->query("update user set
                   login='$r[login]',
                   haslo='$r[haslo]',
                   imie='$r[imie]',
                   nazwisko='$r[nazwisko]',
                   email='$r[email]'
                   $setrole
                   where id='$id'");

    }

    echo "<script> location='#user_show.php?id=$id'</script>";
}
