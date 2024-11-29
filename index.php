<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta DNI</title>
    <script src="js/jquery.min.js"></script>
    <style>
        /* Reset basic styling */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            height: 100%;
        }

        /* Center the form on the screen */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #333;
            font-size: 2em;
            margin-bottom: 20px;
        }

        .input-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .input-container input[type="text"] {
            width: 80%;
            padding: 10px;
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .input-container button {
            padding: 10px 20px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 1em;
        }

        .input-container button:hover {
            background-color: #45a049;
        }

        .info-container {
            margin-top: 20px;
            text-align: left;
            color: #333;
        }

        .info-container div {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        .back-link {
            text-decoration: none;
            color: #007bff;
            font-size: 1em;
            margin-top: 10px;
            display: inline-block;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Consulta DNI</h1>

    <div class="input-container">
        <a href="ruc.php" class="back-link">Consulta RUC</a>
        <br><br>
        <input type="text" id="dni" autocomplete="off" name="dni" placeholder="Ingrese el DNI">
        <br>
        <button id="consultarDNI">Consultar</button>
    </div>

    <div class="info-container">
        <div>Nombres: <label id="nombre"> </label></div>
        <div>Apellido Paterno: <label id="apellidop"> </label></div>
        <div>Apellido Materno: <label id="apellidom"> </label></div>
    </div>
</div>

<script>
$("#consultarDNI").click(function() {
  var dni = $("#dni").val();
  $.ajax({
    type: "POST",
    url: "consulta-dni-ajax.php",
    data: { dni: dni },
    dataType: 'json',
    success: function(data) {
        if (data == 1) {
            alert('El DNI debe tener 8 dígitos.');
        } else {
            console.log(data);
            $("#nombre").html(data.nombres);
            $("#apellidop").html(data.apellidoPaterno);
            $("#apellidom").html(data.apellidoMaterno);
        }
    }
  });
});
</script>

</body>
</html>
