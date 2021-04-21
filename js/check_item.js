function check(){
	Item = document.getElementById('Item').value;
	console.log(Item);
	check_item(Item);
}

function check_item(Item) {
	$("#preloader").show(); //Mostramos el gif de preloader
	return $.ajax({ //Ajax
		url: "check_item.php", //El archivo php que valida
		data: {Item:Item}, //el primer termino es el name de la variable enviada por POST (type) al archivo php
						   //el segundo termino es el valor que se envía.
						   
		type: "POST", //Tipo de envio: POST

		success: function(resposta){ //si es correcte la resposta de check_item.php

			console.log (resposta);
			console.log (resposta.trim() == "disponible"); // El trim() es necesario para eliminar espacios en blanco que incluye el servidor
														   // y que hace que no sea correcta la comparación.

			if (resposta.trim() == "disponible"){ //Si check_item.php da: disponible
				$("#missatge").html("<span class='disponible'>Este Item aún no ha sido añadido a la lista</span>"); //Muestra mensaje
				$("#preloader").hide(); //amaguem el preloader
			}else{ //so e check_item.php diu: no disponible
				$("#missatge").html("<span class='no-disponible'>Este Item ya ha sido añadido a la lista</span>"); //Muestra mensaje
				$("#preloader").hide(); //amaguem el preloader
			}
		},
		error:function (){
		}
	});
}

