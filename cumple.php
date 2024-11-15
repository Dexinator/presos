<?php



if (isset($_POST["submit"])){
    require "enviar.php";
    if ($_RSV->sorteo($_POST["idpreso"])) 
    {
        echo "<div class='ok'>Gracias por venir al cumple de David!</div><br><div class='ok'>Ya estás participando por tu AÑO de PULQUE GRATIS :)</div>";
    }
    
    else { echo "<div class='err'>".$_RSV->error."</div>"; }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <title>Cumple David</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form class="survey-form" method="post" action="">
        <a href="index.php">
            <h1> <img src="logo.png" id="imgprinc"></h1>
        </a>

        <div>
            <label>Regístrate para el sorte de 1 año de Pulque Gratis</label>
            <div class="fields">
                <label for="idpreso">Número de preso</label>
                <div class="field">
                    <input id="idpreso" type="number" name="idpreso">
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