<style>
  #useredit {margin:15%}
  #useredit input{widths:50%}
  #useredit p{margin:8px;width:auto;padding-right:10px}
  #useredit p b{position:relative;width:100px;text-align:right;display:inline-block}
</style>

<?php
include_once "baza.php";

if($id=intval($_GET['id']))
{
    $results = $db->query("SELECT * FROM user where id='$id'");
    $row = $results->fetchArray(); 
    $row['id']==$me or $_SESSION[rola]>1 or die();
    
}

$napis= $id ? 'Zapisz':'Zarejestruj';
?>
<h1> <?= $row['imie'].' '.$row['nazwisko']?> </h1>

<form id='useredit'>
<input type='hidden' name='id' value='<?= $id ?>'>
<p><b>Login</b> <input name='login' value='<?= htmlspecialchars($row['login'])?>'></p>
<p><b>Hasło</b> <input name='haslo' type=password value='<?= htmlspecialchars($row['haslo'])?>'></p>
<p><b>Email</b> <input name='email' value='<?= htmlspecialchars($row['email'])?>'></p>
<p><b>Imię</b> <input name='imie' value='<?= htmlspecialchars($row['imie'])?>'></p>
<p><b>Nazwisko</b> <input name='nazwisko' value='<?= htmlspecialchars($row['nazwisko'])?>'></p>
<?php 
if($_SESSION[rola]>1 && $me!=$id) 
{  
    $sel[$row['rola']]='selected';
    echo "<p><b>Rola:</b><select name='rola'>
            <option value=0 $sel[0] >Niezalogowany</option>
            <option value=1 $sel[1] >Bloger</option>
            <option value=2 $sel[2] >Administrator</option>
        </select>
    </p>";
}
?>
<p><b></b><input type=submit value='<?= $napis ?>'>
 <input type=button value='Anuluj' onclick="window.history.back()"></p>
</form>

<script>
$("#useredit").submit(
    function()
    {   
        var postData = $(this).serializeArray();
        $.ajax(
        {
            url : "user_commit.php",
            type: "POST",
            data : postData,
            success:function(data, textStatus, jqXHR) 
            {
                     $("#center").html(data);
                     $("#left").load("user_list.php");
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
                $("#center").prepend("Błąd połączenia:" + textStatus);
            }
        });
        return false;
    }
);
</script>
