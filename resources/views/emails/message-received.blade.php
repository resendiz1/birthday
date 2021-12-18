<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .contenedor{
        position: relative;
        display: inline-block;
        text-align: center;

    }
    .texto-encima{
        position: absolute;
        top: 45%;
        left: 55%;
        font-size: 60px;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        box-shadow: inset;
    }
    .centrado{
        position: absolute;
        top: 35%;
        left: 60%;
        transform: translate(-50%, -50%);
        font-size: 120px;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    }
</style>

</head>
<body>
    
    <div class="contenedor">
        <img src="https://fondosmil.com/fondo/21837.jpg" />
        <div class="texto-encima">{{$msg->Area_trabajo}}</div>
        <div class="centrado">{{$msg->nombre}}</div>
      </div>
    
</body>
</html>