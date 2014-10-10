<!doctype html>
<head><meta http-equiv="Content-Type" content="charset=utf-8">
<style>
.formLS{
        width: 400px;
        background-color: #EEE;
        border: 2px solid #666;
        color: #6DAAF8;
        padding: 15px;
        font-family: sans-serif;
        font-weight: 700;
        margin: auto;
}
.sent{
        background-color: #4BC5B2;
        color: #FFF;
        margin: auto;
        float: right;
        border-radius: 20px; 
        padding: 5px;
}
</style>
</head>
<body>
<h3> Ejercicio 14 </h3>

<?php
/*14 - Escribir una función personalizada llamada buscar($aguja,$pajar) que devuelva un array con la posición de todas las ocurrencias de aguja en pajar, o el valor FALSE en caso de que no haya ninguna.
Probarla con la llamada buscar ('Ana', 'Ana Irene Palma').*/

function buscar($aguja,$pajar){
	$cadenas = explode ( " " , $pajar); //transformo la cadena en un array de cadenas
	$findPalabra = array();
	
	var_dump($cadenas);

	foreach ($cadenas as $indice => $palabra)
		if( strcmp(  strtolower( trim ($palabra,".\t\n:") ), strtolower( trim ($aguja) )  ) === 0 )// o usar stristr()
			$findPalabra[] = $indice;
	
	return $findPalabra;
}

if(isset($_POST['aguja']) && isset($_POST['pajar'])){
	if (empty($_POST['aguja']) || empty($_POST['pajar'])){
		header ('refres: 5, url='.$_SERVER['PHP_SELF']);
	}else{
		$search= buscar ($_POST['aguja'], $_POST['pajar']);
		if(sizeof($search)>0)
			foreach ($search as $value) echo "Es la ".($value+1)."ª palabra <br>";
		else
			echo "No existe la palabra en la cadena";
	}
}else{
	echo '<div class="formLS">
		<h3>Buscar palabra</h3>
		<form action="'.$_SERVER['PHP_SELF'].'" method="post">
			Frase: <textarea rows="4" cols="30" name="pajar" style="margin: 2px; width: 388px; height: 283px;" required ></textarea><br>
			Palabra: <input type="text" name="aguja" required /><br>
			<input type="submit" value="Enviar" class="sent" />
		</form>
        </div>';
}
?>
</body>
</html>