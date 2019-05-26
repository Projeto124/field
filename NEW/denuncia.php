<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastro</title>
  </head>
  <body>
      <h2>CADASTRO DE DENÚNCIA</h2>
      <form class="" action="processa.php" method="post"><br>

    <p> situação atual:  <select name="status">
     <option value="aberto">Aberto</option>
     <!-- <option value="confirmado">confirmado</option>
     <option value="notificado">notificado</option>
     <option value="finalizado">finalizado</option> -->
</select>
<br> </p>
          <p>Descreva abaixo a situação encontrada:</p>
     <textarea name="comentario" rows="8" cols="80"></textarea>
</br>
        <?php
      $fuso=new DateTimeZone('America/Campo_Grande');
      $data=new DateTime();
      $data->setTimeZone($fuso);

      echo  $data->format('d-m-Y H:i:s').'</br>';


 $dataDenuncia=date('d/m/y');
 echo $dataDenuncia.'</br>';
 echo date('h:i:s').'</br>';
?>
          <input type="submit" name="enviar" value="Enviar">
      </form>



    </div>
  </body>
</html>
