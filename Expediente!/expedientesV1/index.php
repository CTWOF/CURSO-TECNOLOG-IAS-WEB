<?php
require_once '../comun/libreria.php';
			
cabecera('Formulario a PDF','');			
?>
	<form action="formMail.php" method="post" enctype="multipart/form-data">
		<label>Nombre: </label><input type="text" name="nombre" value="Borja"><br>
		<label>Apellido 1: </label><input type="text" name="ape1"><br>
		<label>Apellido 2: </label><input type="text" name="ape2"><br>
		<label>Idiomas: </label>
		<input type="checkbox" value="es" name="idiomas[]">Castellano
		<input type="checkbox" value="ca" name="idiomas[]">Català
		<input type="checkbox" value="fr" name="idiomas[]">Francés
		<input type="checkbox" value="en" name="idiomas[]">Inglés<br>
		<label>Genero: </label>
		<input type="radio" value="Hombre" name="genero">Hombre
		<input type="radio" value="Mujer" name="genero">Mujer
		<input type="radio" value="Otro" name="genero">Otro
		<hr>
		<span>Sube una foto:</span>
        <input type="file" name="fichero1" />
		<hr>
		<div class="materia">
			<h2>Ciencias</h2>
			<input type="hidden" name="materias[0][nombre]" value="Ciencias">
			Nota: 
			<select name="materias[0][nota]">
				<option value="suspendido">Suspendido</option>
				<option value="aprobado">Aprobado</option>
				<option value="notable">Notable</option>
				<option value="sobrasaliente">Sobresaliente</option>
				<option value="MH">Matrícula de honor</option>
			</select><br>
			Comentarios:
			<textarea name="materias[0][comentario]" placeholder="Comentarios"></textarea>
		</div>
		<div class="materia">
			<h2>Matematicas</h2>
			<input type="hidden" name="materias[1][nombre]" value="Matematicas">
			Nota: 
			<select name="materias[1][nota]">
				<option value="suspendido">Suspendido</option>
				<option value="aprobado">Aprobado</option>
				<option value="notable">Notable</option>
				<option value="sobrasaliente">Sobresaliente</option>
				<option value="MH">Matrícula de honor</option>
			</select><br>
			Comentarios:
			<textarea name="materias[1][comentario]" placeholder="Comentarios"></textarea>
		</div>		
		<div class="materia">
			<h2>Historia</h2>
			<input type="hidden" name="materias[2][nombre]" value="Historia">
			Nota: 
			<select name="materias[2][nota]">
				<option value="suspendido">Suspendido</option>
				<option value="aprobado">Aprobado</option>
				<option value="notable">Notable</option>
				<option value="sobrasaliente">Sobresaliente</option>
				<option value="MH">Matrícula de honor</option>
			</select><br>
			Comentarios:
			<textarea name="materias[2][comentario]" placeholder="Comentarios"></textarea>
		</div>		
		
	<br><input type="submit" value="Enviar" name="botonSubmit">	
	</form>

<?php
pie();
?>
		