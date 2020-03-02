<?php
include_once "baza.php";

$id=intval($_GET['id']);
$results = $db->query("SELECT * FROM news WHERE id='$id'");
$row = $results->fetchArray(); 

if($id) 
{
    $napis='Zapisz';
}
else
{
    $napis='Dodaj';
    $row['data']=date("Y-m-d");
}

$s[$row['kategoria']]='selected';

?>

<form id='newsedit' action='news_commit.php'>

<input type='hidden' name='id' value='<?= $id ?>'>

<p><b>Kategoria:</b> <select name='kategoria'>
            <option <?= $s[Smartfony] ?>>Smartfony</option>
            <option <?= $s[Smartwatche] ?>>Smartwatche</option>
            <option <?= $s[Trackery_fitnesowe] ?>>Trackery fitnesowe</option>
            <option <?= $s[Aktualności] ?>>Aktualności</option>
            </select></p>

<p><b>Tytuł:</b> <input name='tytul' value='<?= htmlspecialchars($row[tytul])?>'></p>

<p><b>Skrót:</b> <textarea name='skrot'><?= htmlspecialchars($row[skrot])?></textarea></p>

<p><b>Tekst:</b> <textarea name='tekst'><?= htmlspecialchars($row[tekst])?></textarea></p>

<p><b>Url:</b> <textarea name='url'><?= htmlspecialchars($row[url])?></textarea></p>

<p><b>Opublikowana:</b> <input name='pokaz' value=1 type='checkbox' <?= $row[pokaz] ? 'checked':'' ?>></p>

<p><b>Strona&nbsp;główna:</b> <input name='main' value=1 type='checkbox' <?= $row[main] ? 'checked':'' ?>></p>

<p><b></b><input type=submit value='<?= $napis ?>'>

<input type=button value='Anuluj' onclick="window.history.back()"></p>

</form>

<script>
$("#newsedit").submit(
    function(e)
    {   
        var postData = $(this).serializeArray();
        $.ajax(
        {
            url : "news_commit.php",
            type: "POST",
            data : postData,
            success:function(data, textStatus, jqXHR) 
            {
                     $("#center").html(data);
                     $("#right").load("news_list.php");
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
