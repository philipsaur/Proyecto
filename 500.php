<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 500</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}
    body{
        background: orange;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .container-404{
        text-align: center;
        width: 100%;
        max-width: 400px;
        background: white;
        padding: 20px;
        box-shadow: 0px 1px 10px rgba(0,0,0,0.3);
        border-radius: 5px;
        line-height: 1.7;
        color: #434343;
    }
    .boton{
        display: inline-block;
        margin-top: 15px;
        text-decoration: none;
        background: #1a84d3;
        color: #fff;
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 15px;
    }
        </style>
</head>
<body>
<header>
<img src="PSG.png" class="logo" alt="fundacion">
</header>
    <div class="container-404">
        <h1>ERROR 500</h1>
        <h2>Error Interno del Servidor</h2>
        <p>Hay un problema, y no se puede mostrar</p>
        <a href="index.html" Class="boton">
            Pagina Principal
        </a>

    </div>
</body>
</html>