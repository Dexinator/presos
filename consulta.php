    <?php



if (isset($_POST["submit"])){
    require "enviar.php";
    if ($_RSV->consulta($_POST["con_name"])) 
    {
        echo "<div class='ok'>Búsqueda exitosa</div>";

		  
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

        <div>
            <div class="fields">
                <label>Te buscaremos en nuestra base de datos</label>
                <br>
                <br>
                <label for="name">Introduce tu nombre, puede ser solo una parte</label>
                <div class="field">
                    <input id="name" type="text" name="con_name" placeholder="Tu nombre" required>
                </div>
                <p></p>
                <div class="buttons">
                    <input type="submit" class="btn" name="submit" value="Consultar" id="checkBtn">
                </div>
            </div>
        </div>

    </form>

<?php if (!empty($_RSV->resultados)): ?>
<h1>Resultados de la Búsqueda</h1>
            <table border="1" class="center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_RSV->resultados as $fila): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($fila['reg_name']); ?></td>
                            <td><?php echo htmlspecialchars($fila['id']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    <?php else: ?>
        <p>No se encontraron resultados.</p>
    <?php endif; ?>


    <div class="bottom">

            <span class="yellow-with-darkyellow">© Palacio Negro 2024</span>
        <div class="credit grey-with-red">Credit <span class="yellow-with-darkyellow">1</span></div>
    </div>

</body>

</html>