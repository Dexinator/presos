<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "u7k9gwgramrrl", "968*d0aJ", "dbn6gh2wq1ksqg");

$query = "SELECT * FROM presos";
$stmt = $mysqli->prepare($query);
$stmt->execute();

/* store the result in an internal buffer */
$stmt->store_result();

$nombre=$_POST["reg_name"];
$numrows=$stmt->num_rows;
$whatsapp=$_POST["res_tel"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
<script src="./canvas2image.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=BIZ+UDMincho&display=swap" rel="stylesheet">
<style>
.biz-udmincho-regular {
  font-family: "BIZ UDMincho", serif;
  font-weight: 400;
  font-style: normal;
}
</style>
</head> 

<body>
<div class="container" id="container">
  <img src="tarjeta.png" alt="Snow" style="width:750px;">
  <div class="centered"><?php echo $nombre; ?><br>Preso# <?php echo $numrows; ?>
  </div>
</div> 
<input type="button" id="btnSave" value="Guardar"/>
<a  href="https://wa.me/<?= $whatsapp ?>"><input type="button" value="Envíala por WA"/></a>
<div id="img-out"></div>
</body>
</html>

<script>
$(function() { 
    $("#btnSave").click(function() { 
        html2canvas($("#container"), {
            onrendered: function(canvas) {
                theCanvas = canvas;
                document.body.appendChild(canvas);

                // Convert and download as image 
                Canvas2Image.saveAsPNG(canvas); 
                $("#img-out").append(canvas);
                // Clean up 
                //document.body.removeChild(canvas);
            }
        });
    });
}); 


</script>

<style>
    .container {
  position: relative;
  text-align: center;
  color: white;
  width:750px;
  line-height: 0px;
}


/* Centered text */
.centered {
  font-size:40px;
  position: absolute;
  top: 50%;
  left: 70%;
  transform: translate(-50%, -50%);
  line-height: normal;
}
</style>