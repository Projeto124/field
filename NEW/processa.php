<?php
	include_once "config.php";
	include_once "connection.php";

	session_start();

	$conexao = new Connection($host, $user, $password, $database);

//--------------------------------------------------------------------------- Login  ----------------------------------------------------

	if($_SERVER['HTTP_REFERER'] === $url.'login.php')
	{
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$senha = sha1($senha);

		if( (empty($login) == TRUE) || (empty($senha) == TRUE) )
		{
			echo "Você deve preencher todos os campos corretamente!";
			header("Refresh: 2; url=login.php");
			exit(0);
		}
		else
		{
			$sql = "SELECT * FROM usuario WHERE login = '$login'";

			$conexao->query($sql);

			if($conexao->num_rows() > 0)
			{
				$sql = "SELECT permissao,idUsuario, nome AS n FROM usuario WHERE login = '$login' AND
						senha = '$senha'";

				$conexao->query($sql);

				if($conexao->num_rows() > 0)
				{
					$tupla = $conexao->fetch_assoc();
					$idUsuario = $tupla['idUsuario'];
					$nome = $tupla['n'];
					$perm=$tupla['permissao'];

					$_SESSION['idUsuario'] = $idUsuario;
					$_SESSION['nome'] = $nome;
					$_SESSION['permissao'] = $perm;

					header("Refresh: 0; url=inicial2.php");
				}
				else
				{
					echo "Login e senha não correspondem";
					header("Refresh: 2; url=login.php");
					exit(0);
				}

			} else{
				echo "login inexistente";
				header("Refresh: 2; url=login.php");
			}
		}
	}
	else
	{

		//--------------------------------------------------------------------------- Cadastro de Usuario----------------------------------------------------
		if($_SERVER['HTTP_REFERER'] === $url.'cadastroUsuario.php')
		{
			$login = $_POST['login'];
			$senha = $_POST['senha'];
			$confirmarSenha = $_POST['confirmarSenha'];
			$nome = $_POST['nome'];
      $CPF= $_POST['CPF'];
			$email = $_POST['email'];
			$permissao=$_POST['permissao'];

			if( (empty($login) == TRUE) || (empty($senha) == TRUE) || (empty($nome) == TRUE) || (empty($CPF) == TRUE) || (empty($email) == TRUE) || (empty($permissao) == TRUE))
			{
				echo "Você deve preencher todos os campos corretamente!";
				header("Refresh: 2; url=cadastroUsuario.php");
				exit(0);
			}

			if($senha !== $confirmarSenha)
			{
				echo "Senhas não correspondem";
				header("Refresh: 2; url=cadastroUsuario.php");
				exit(0);

			}
			$sql = "SELECT * from usuario WHERE CPF = '$CPF'";

			$conexao->query($sql);

			if ($conexao->num_rows() > 0) {
				echo "CPF já cadastrado, tente novamente ";
				header("Refresh: 2; url=cadastroUsuario.php");
			}else{

			$senha = sha1($senha);


			$sql = "INSERT INTO usuario(login, nome, CPF, email, senha, permissao) VALUES
					('$login', '$nome', '$CPF', '$email','$senha','$permissao')";

			$status = $conexao->query($sql);

			if($status === TRUE)
			{
				echo "Cadastro feito com sucesso!";
				header("Refresh: 2; url=inicial.html");
				exit(0);
			}
		}
		} else {



//para baixo erro

//--------------------------------------------------------------------------- Cadastro de Terreno-------------------------------------


			if($_SERVER['HTTP_REFERER'] === $url.'cadastroTerreno.php')
			{
				$endereco = $_POST['endereco'];
				$numero = $_POST['numero'];
				$gravidade = $_POST['gravidade'];
				$conteudoImagem=$_FILES["imagem"]["tmp_name"];
				$tamanhoImagem=$_FILES["imagem"]["size"];

				if( (empty($endereco) == TRUE) || (empty($numero) == TRUE) || (empty($gravidade) == TRUE) )
				{
					echo "Você deve preencher todos os campos corretamente!";
					header("Refresh: 3; url=cadastroTerreno.php");
					exit(0);
				}




				 if ( $conteudoImagem != "none" )
				 {
				 	$fp = fopen($conteudoImagem, "rb");
				 	$conteudoIm = fread($fp, $tamanhoImagem);
				 	$conteudoIm = addslashes($conteudoIm);
				 	fclose($fp);



					$sql = "INSERT INTO terreno(endereco, numero, gravidade,imagem) VALUES
							('$endereco', '$numero', '$gravidade','$conteudoIm')";

					$status = mysqli_query($conexao->getLink(), $sql);

// exit(0);
					if($status === TRUE)
					{
						$last_id = mysqli_insert_id($conexao->getLink());
						echo $last_id;

						echo "Cadastro do Terreno efetuado com sucesso! Redirecionando para Denuncia.";
						header("Refresh: 4; url=denuncia.php?id=".$last_id);
						exit(0);
					} else{
						echo "Ocorreu um erro durante o cadastro do Terreno. Por favor, tente novamente";
						header("Refresh: 4; url=cadastroTerreno");
					}
				 }
			}

			else {
//--------------------------------------------------------------------------- Denuncia-------------------------------------

if($_SERVER['HTTP_REFERER'] === $url.'denuncia.php')  //CUIDADO COM O GET POIS O DIRETORIO VEM ERRADO E ELE PARA NO PROCESSA.PHP
{
	// $endereco = $_POST['endereco'];
	// $numero = $_POST['numero'];
	// $gravidade = $_POST['gravidade'];
	// $fuso=new DateTimeZone('America/Campo_Grande');
	$data = date('Y-m-d H:i:s');
	// $data->setTimeZone($fuso);
  $stats=$_POST['status'];
	$comentario=$_POST['comentario'];
	$fkUsuario=$_SESSION['idUsuario'];


	if( (empty($stats) == TRUE) || (empty($comentario) == TRUE))
	{
		echo "Você deve preencher todos os campos corretamente!";
		header("Refresh: 2; url=denuncia.php");
		exit(0);
	}




	$sql = "INSERT INTO denuncia(comentario, status, dataPublicacao,id_usuario,id_terreno) VALUES
			('$comentario', '$stats', NOW(),'$fkUsuario','4')";

	$status = $conexao->query($sql);

	if($status === TRUE)
	{
		echo "Denuncia efetuada com sucesso!";
		header("Refresh: 2; url=inicial2.php");
		exit(0);
	}
}

			}






		}
}

?>
