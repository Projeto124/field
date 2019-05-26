<html>
<head>
	<title>Cadastro de Usuário</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
	<body>
		<div class="container">
			<form name="cadastro" enctype="multipart/form-data" action="processa.php" method="POST" onSubmit="return verifica();">

				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome">
				<br>

				<label for="email">Email</label>
				<input type="text" name="email" id="email">
				<br>

				<label for="login">Login</label>
				<input type="text" name="login" id="login">
				<br>

        <label for="CPF">CPF</label>
				<input type="number" onclick="atencao()" name="CPF" id="CPF">
				<br>

				<label for="senha">Senha</label>
				<input type="password" name="senha" id="senha">
				<br>

				<label for="confirmarSenha">Confirmar Senha</label>
				<input type="password" name="confirmarSenha" id="confirmarSenha">
				<br>

 <select name="permissao">
	<option value="padrao">Usuario padrao</option>
	<<option value="admin">administrador</option>

</select>
<br>

				<input type="submit" name="Cadastrar">

				<script type="text/javascript">

// e.message is 'Could not parse input'

					function verifica(){
						var nome, email, login, CPF, senha, confirmarSenha;
 				// 	var email	= document.getElementById('email');
 				// 	var cpf = document.getElementById('CPF');
 				// 	var senha = document.getElementById('senha');
 				// 	var confirmaSenha = document.getElementById('confirmarSenha');

						if(document.cadastro.nome.value==""){
						alert("Você deve preencher o Nome corretamente");						
						document.cadastro.nome.focus();
						return false;
						}
						if (document.cadastro.email.value=="") {
							alert("Você deve preencher o email corretamente");
							document.cadastro.email.focus();
							return false;
						}
							if (document.cadastro.login.value=="") {
								alert("Você deve preencher o login corretamente");
								document.cadastro.login.focus();
								return false;
							}
								if (document.cadastro.CPF.value=="") {
									alert("Você deve preencher o CPF corretamente");
									document.cadastro.CPF.focus();
									return false;
								}
									if (document.cadastro.senha.value=="") {
										alert("Você deve preencher a senha corretamente");
										document.cadastro.senha.focus();
										return false;
									}
										if (document.cadastro.confirmarSenha.value=="") {
											alert("Você deve confirmar a senha corretamente");
											document.cadastro.confirmarSenha.focus();
											return false;
										}
										if (document.cadastro.senha.value.length < 6) {
											alert("Você deve informar uma senha maior com no mínimo 6 caractéres");
											document.cadastro.confirmarSenha.focus();
											return false;
										}
										if (document.cadastro.confirmarSenha.value != document.cadastro.senha.value) {
											alert("Senhas não correspondem");

											document.cadastro.confirmarSenha.focus();
											return false;
										}

				}
				var cont = 0;
				if (cont == 0) {
					function atencao(){
						if (cont == 0) {
							alert("Somente números");
						}
						cont = 1;
					}
				}

				</script>
			</form>
		</div>
	</body>
</html>
