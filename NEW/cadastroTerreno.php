<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastro</title>
  </head>
  <body>
      <h2>CADASTRO DO TERRENO</h2>
      <a href="cadastroTerreno.php"><p>Cadastre o terreno que deseja denunciar</p></a>
      <form class="" action="processa.php" method="post" enctype="multipart/form-data"><br>
        <p>Endereço:</p>
        <input type="text" name="endereco" value=""><br>
        <p>Número da propriedade: (opcional)</p>
        <input type="number" name="numero" value=""><br>
        <p>Gravidade:</p>
        <ul>
          <input type="radio" name="gravidade" value="Baixo"> Baixo<br>
          <input type="radio" name="gravidade" value="Moderado"> Moderado<br>
          <input type="radio" name="gravidade" value="Crítico"> Crítico<br>
          </ul>
          <br>
          <p>Insira a imagem do terreno:</p><br>
          <input type="file" name="imagem" value=""><br><br>


          <input type="submit" name="enviar" value="Enviar">
      </form>



    </div>
  </body>
</html>
