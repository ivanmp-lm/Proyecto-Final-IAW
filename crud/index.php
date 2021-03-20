<?php
// including the database connection file
include_once("config.php");

// fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Proyecto Final IAW - IMP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">	
</head>

<body>
<div class = "container">
	<div class="jumbotron">
      <h1 class="display-4">Simple LAMP web app - Iván Martínez</h1>
      <p class="lead">Demo app</p>
    </div>	
	<a href="add.html" class="btn btn-primary">Añadir datos</a><br/><br/>
	<table width='80%' border=0 class="table">

	<tr bgcolor='#CCCCCC'>
		<td>Nombre</td>
		<td>Primer apellido</td>
		<td>Segundo apellido</td>
		<td>Edad</td>
		<td>Email</td>
		<td>Modificar</td>
	</tr>

	<?php
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>\n";
		echo "<td>".$res['name']."</td>\n";
		echo "<td>".$res['apellido1']."</td>\n";
		echo "<td>".$res['apellido2']."</td>\n";
		echo "<td>".$res['age']."</td>\n";
		echo "<td>".$res['email']."</td>\n";
		echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Eliminar</a></td>\n";
		echo "</tr>\n";
	}

	mysqli_close($mysqli);
	?>
	</table>
</div>
</body>
</html>