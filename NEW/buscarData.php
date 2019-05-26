<html>
<head>
	<title>Busca de terrenos</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
	<body>
		<div class="container">
			<form action="processaBusca.php" method="POST">
<p> Selecione o período que deseja buscar:</p><br>
        <label for="data1">De</label>
        <input type="date" name="data1" id="data1">

        <label for="data2">a</label>
        <input type="date" name="data2" id="data2">
        <br>



				<input type="submit" name="Buscar">
			</form>
		</div>
	</body>
</html>
