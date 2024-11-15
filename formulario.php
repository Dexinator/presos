<?php



if (isset($_POST["submit"])){
    require "enviar.php";
	if (isset($_POST["cellmate"])){
		if ($_RSV->captor($_POST["cellmate"])){
			echo "Registro Exitoso";
		}
		else
		{ echo "nosir";}
	}
    if ($_RSV->save($_POST["cellmate"],
	$_POST["reg_name"],
    $_POST["res_tel"],
    $_POST["IGname"],
    $_POST["Bday"],
    $_POST["mkt"])) 
    {
        echo "<div class='ok'>Preso Encarcelado.</div>";
		require "card.php";
		/*
        echo '<script>
		setTimeout(function(){ window.location.href= "index.php";}, 5000);
		  </script>';*/
    }
    
    else { echo "<div class='err'>".$_RSV->error."</div>"; }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,minimum-scale=1">
	<title>Registro Presos</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form class="survey-form" method="post" action="">
		<a href="index.php">
		<h1> <img src="logo.png" id="imgprinc"></h1>
		</a>
		
		<div >
			<div class="fields">
			<label for="cellmate">ID de su captor</label>
				<div class="field">
					<input id="cellmate" type="number" name="cellmate" >
				</div>
				<p></p>

				<label for="name">Nombre</label>
				<div class="field">
					<input id="name" type="text" name="reg_name" placeholder="Tu nombre" required>
				</div>
				<p></p>

				<label for="res_tel">Teléfono de contacto</label>
				<div class="field">
					<i class="fab fa-whatsapp"></i>
					<input type="tel" required name="res_tel" id="tel" placeholder="solo te llamaremos si es necesario" maxlength="10" minlength="10" />
				</div>
				<p></p>
				<label for="IGname">Usuario de IG</label>
				<div class="field">
					<input type="text" name="IGname" id="IGname" placeholder="Opcional"/>
				</div>
				<p></p>
				<label for="Bday">Fecha de Cumpleaños</label>
				<div class="field">
					<input type="date" name="Bday" id="Bday"/>
				</div>
				<p></p>
				<label >¿Deseas recibir promociones?</label>
				<div class="field">
					<input type="radio" id="mktyes" name="mkt" value="1" checked />
    				<label for="mktyes">Sí</label>
					<input type="radio" id="mktno" name="mkt" value="0" />
    				<label for="mktno">No</labe>
				</div>
				<div class="buttons">
					<input type="submit" class="btn" name="submit" value="Registrar" id="checkBtn">
				</div>
			</div>
		</div>

	</form>

  <div class="bottom">
        <span class="yellow-with-darkyellow">© Palacio Negro 2024</span>
      <div class="credit grey-with-red">Credit <span class="yellow-with-darkyellow">1</span></div>
    </div>

</body>
</html>