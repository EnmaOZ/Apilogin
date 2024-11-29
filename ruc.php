<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta RUC</title>
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
    <h1>Consulta RUC</h1>

    <div class="input-container">
        <a href="index.php" class="back-link">Consulta DNI</a>
        <br><br>
        <input type="text" autocomplete="off" id="ruc" name="ruc" placeholder="Ingrese el RUC">
        <br>
        <button id="pruebaruc">Consultar</button>
    </div>

    <div class="info-container">
        <div>RUC: <label id="rucNumero"> </label></div>
        <div>Nombre o Razón social: <label id="razonsocial"> </label></div>
        <div>Estado: <label id="estado"> </label></div>
        <div>Dirección: <label id="direccion"> </label></div>
        <div>Departamento: <label id="departamento"> </label></div>
    </div>
</div>

<script>
$("#pruebaruc").click(function(){
  var ruc = $("#ruc").val();
  $.ajax({
    type: "POST",
    url: "consultar-ruc-ajax.php",
    data: 'ruc=' + ruc,
    dataType: 'json',
    success: function(data) {
        if (data == 1) {
            alert('El RUC tiene que tener 11 digitos');
        } else {
            console.log(data);
            $("#rucNumero").html(data.numeroDocumento);
            $("#razonsocial").html(data.nombre);
            $("#estado").html(data.estado);
            $("#direccion").html(data.direccion);
            $("#departamento").html(data.departamento);
        }
    }
  });
});
</script>

</body>
</html>
