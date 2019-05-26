<?php
	include_once "config.php";
	include_once "connection.php";

session_start();

	$conexao = new Connection($host, $user, $password, $database);

  if($_SERVER['HTTP_REFERER'] === $url.'buscarData.php')
  {
    $data1=$_POST['data1'];
    $data2=$_POST['data2'];


    $sql = "SELECT * FROM denuncia WHERE dataPublicacao between '$data1' AND '$data2'";

    $conexao->query($sql);

		for($tupla = $conexao->fetch_assoc(); $tupla != NULL; $tupla = $conexao->fetch_assoc())
    {
			$fk_terreno=$tupla['id_terreno'];
    }
  $sql = "SELECT * FROM terreno WHERE id like '$fk_terreno'";

	$status = $conexao->query($sql);

    if($status === TRUE){
			$status = mysqli_query($conexao->getLink(), $sql);
			$imagem = mysqli_fetch_assoc($status);

    echo "<table border=1 cellpadding=3 cellspacing=0>";
    echo "<tr>";
    echo "<th>Endereço</th>";
    echo "<th>Número</th>";
    echo "<th>Gravidade</th>";
    echo "<th>imagem</th>";
    echo "</tr>";

    for($tupla = $conexao->fetch_assoc(); $tupla != NULL; $tupla = $conexao->fetch_assoc())
    {
      echo "<tr>";
      echo "<td>".$tupla['endereco']."</td> ";
      echo "<td>".$tupla['numero']."</td> ";
      echo "<td>".$tupla['gravidade']."</td> ";
		 // $fk_terreno=$tupla['id'];
		 // echo $fk_terreno;
		 	echo "<td>";
 	 		echo '<img width="200px" height="200px" src="data:image/jpeg;base64,'.base64_encode($imagem['imagem']).'"/>';
 			echo "</td>";
      echo "</tr>";
    }
    echo "</table>";

      echo "Busca efetuada com sucesso!<br>";
			echo "<a href='inicial2.php'>Voltar a página inicial<a><br>";
    }
  }
//-------------------------------------------------
   else{
     if($_SERVER['HTTP_REFERER'] === $url.'buscarEndereco.php')
     {
   $rua=$_POST['rua'];

       $sql = "SELECT * FROM terreno WHERE endereco like '%$rua%'";

       $status = $conexao->query($sql);


       if($status === TRUE){
				 $status = mysqli_query($conexao->getLink(), $sql);
 			 	 $imagem = mysqli_fetch_assoc($status);

       echo "<table border=1 cellpadding=3 cellspacing=0>";
       echo "<tr>";
       echo "<th>Endereço</th>";
       echo "<th>Número</th>";
       echo "<th>Gravidade</th>";
     	 echo "<th>imagem</th>";
       echo "</tr>";

       for($tupla = $conexao->fetch_assoc(); $tupla != NULL; $tupla = $conexao->fetch_assoc())
       {
         echo "<tr>";
         echo "<td>".$tupla['endereco']."</td> ";
         echo "<td>".$tupla['numero']."</td> ";
         echo "<td>".$tupla['gravidade']."</td> ";
				 echo "<td>";
  		 	 echo '<img width="200px" height="200px" src="data:image/jpeg;base64,'.base64_encode($imagem['imagem']).'"/>';
				 echo "</td>";
         echo "</tr>";
       }
       echo "</table>";

         echo "Busca efetuada com sucesso!<br>";
				 echo "<a href='inicial2.php'>Voltar a página inicial<a><br>";
       }
     }
		 //-------------------------------------------------------------------
		 else{
			 if($_SERVER['HTTP_REFERER'] === $url.'acompanhar.php')
			 {
		 $codigo=$_POST['codigo'];

				 $sql = "SELECT * FROM denuncia WHERE id_terreno like '$codigo'";

				 $status = $conexao->query($sql);


				 if($status === TRUE){
				 echo "<table border=1 cellpadding=3 cellspacing=0>";
				 echo "<tr>";
				 echo "<th>Endereço</th>";
				 echo "<th>Número</th>";
				 echo "<th>Gravidade</th>";
				 // echo "<th>imagem</th>";
				 echo "</tr>";

				 for($tupla = $conexao->fetch_assoc(); $tupla != NULL; $tupla = $conexao->fetch_assoc())
				 {
					 echo "<tr>";
		       echo "<td>".$tupla['comentario']."</td> ";
		       echo "<td>".$tupla['status']."</td> ";
		       echo "<td>".$tupla['dataPublicacao']."</td> ";
		       // echo "<td>".$tupla['imagem']."</td> ";
		       echo "</tr>";
				 }
				 echo "</table>";

					 echo "Busca efetuada com sucesso!<br>";
					echo "<a href='inicial2.php'>Voltar a página inicial<a><br>";
				 }
			 }

		 }

  }
?>
