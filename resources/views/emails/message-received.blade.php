<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Feliz Cumpleaños</title>
</head>
<body>
  

  <div class="contenedor" style="border: red 3px double; padding: 30px; height:480px">
    <img src="https://static.wixstatic.com/media/08d4fc_d1a07983fc9a4ec79b17973f2e241cad~mv2.png/v1/fill/w_220,h_86,al_c,q_85,usm_0.66_1.00_0.01/logo%20pabsa%20grupo.webp" style="width: 150px" alt="Grupo PABSA">

    <h1 style="position: absolute; top:5%; left:25%; text-align: center;">{!!$title!!}</h1>

    <img src="{{$imagen}}" style="width: 400px; position: absolute; top:15%; left:22%" alt="">


    <p style="width: 690px; position: absolute; top:42%; left:3%">{{$body}}</p>
    
    <strong style="text-align: center; position: absolute; top:50%; left:35%">Te desea: Grupo PABSA</strong>
  </div>

</body>
</html>