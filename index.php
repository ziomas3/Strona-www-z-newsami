<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mobilnie</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link href='style.css' rel='stylesheet'>
    </head>
<body>

<table id=all>
<tr>
  <td colspan=3 id='top'>
    <h2 id=title></h2>
    <div id='menu'></div>
  </td>
</tr>
<tr>
    <td id='left'></td>
    <td id='center'></td>
    <td id='right'></td>
</tr>
<tr><td id='bottom' colspan=3></td></tr>
</table>
</body>

<script> 
$(window).on("hashchange",function(){
	$("#center").load(location.hash.substr(1)); //pomijanie 1 znaku
    });

$("#menu").load("menu.php");
$("#left").load("user_list.php");
$("#center").load(location.hash?location.hash.substr(1):"news_show.php?main=1");
$("#right").load("news_list.php");
$("#bottom").load("footer.php");
$("#title").html("Forum o urządzeniach mobilnych");
</script>
</html>

