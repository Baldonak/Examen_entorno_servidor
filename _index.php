<!doctype html>
<html lang="es">
<head>
	<!-- Información Meta -->
	<meta charset="utf-8"/>
	<meta name="description" content="Lorem Ipsum">
	<meta name="keywords" content="Lorem, Ipsum">
	<meta name="author" content="Lorem Ipsum">
	
	<!-- Enlaces a los archivos CSS externos -->
	<link rel=stylesheet href="css/style.css" type="text/css"/>
	
	<!--CSS Intern-->
	<style type="text/css">

		
	</style>

	<!--JQUERY-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js" ></script> 

	<!-- External checkuser JS -->
	<script  type="text/javascript" src="js/check_item.js"></script>
	
	<!-- Enllaç a Javascript Extern -->
	<script  type="text/javascript" src="js/javascript.js"></script>
	
	<!-- favicon -->
	<link href="img/favicon.png" rel="icon" type="image/png" />

	<!-- Archivos php incluidos -->
	<?php include "db/Consulta_base_datos.php"?>
	
	<!-- Títol de la pàgina -->
	<title>Control de stock</title>

</head>
<body>
	<header></header>
	<section>
		<article>
			<h2>Control de stock</h2>

			<form onsubmit="return validar_form();" action="db/Insertar_entrada.php" method="POST" class="Formulario_insertar_entrada">

				<br>
				<p>Item:<input type="text" id="Item" name="Item" onblur="validar_item()" oninput="check()"></p>
				<p id="mensaje_item"></p>
				<span id="missatge"></span>
				<p><img src="img/preloader.gif" id="preloader" style="display:none" ></p>
				<p>Stock:<input type="number" min="0" step="1" id="Stock" name="Stock" onblur="validar_stock()"></p>
				<p id="mensaje_stock"></p>
				<p><button name="Boton_enviar" type="submit">Enviar</button></p>

			</form>


			<?php 
			
			//EJECUCIÓN DE LA CONSULTA

			$Resultado = Consulta_base_datos();

			//IMPRIMIR EL RESULTADO

			echo "<table class='tabla_resultado'>";

			echo "<tr>";

			 	echo "<th>Id</th>";

			 	echo "<th>Item</th>";
		 
			 	echo "<th>Stock</th>";

				echo "<th>Eliminar</th>";
			
			echo "</tr>";
		 
				if ($Resultado->num_rows > 0) { 
		 
					 while($fila = $Resultado->fetch_assoc()) {
			echo "<tr>";
				$Id = $fila["id"];
				echo "<td>".$Id."</td>";
				$Item = $fila["item"];
				echo "<td>".$Item."</td>";
				$Stock = $fila["stock"];
				echo "<td>".$Stock."</td>";
				echo "<td><a href='db/Eliminar_registro.php?id=$Id'>Eliminar registro</a></td>";
			echo "</tr>";
					 }

				}

			echo "</table>"
			
			?>

			<br><br>
			<a href="txt/Generar_txt.php">Generar txt</a>
			<a href="txt/datos.txt">Descargar txt</a>

			<p>*Para descargar la lista: click derecho > Guardar enlace como</p>

		</article>
	</section>
	<footer></footer>
</body>
</html>