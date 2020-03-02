<style>
  #loginform {margin:20%}
  #loginform p {margin:5px}
</style>
<form id='loginform'>
<p>Login: <input name=login></p>
<p>Hasło: <input name=haslo type=password></p>
<p><input type=submit value='Zaloguj'></p>
</form>

<script>
$("#loginform").submit(
    function(){
    $.ajax({
	url:"login_commit.php",
	type:"POST",
	data: $(this).serializeArray(),
	success: function(data){ 
	      $("#center").html(data); 
              $("#menu").load("menu.php");
	}
	});
    return false;
    }
);
</script>