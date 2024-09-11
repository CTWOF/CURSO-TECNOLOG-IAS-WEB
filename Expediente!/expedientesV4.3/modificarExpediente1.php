<?php
require_once '../comun/libreria.php';
cabecera('Modificar expediente','');

//Recuperar los datos del JSON
$fichero = file_get_contents('expedientes.json');
//Convertir los datos en formato json a un array de php
$expedientes = json_decode($fichero,true);
//recuperamos el id pasado por parametro
$id = $_GET['id'];
echo '<pre>';
print_r($expedientes[$id]);
echo '</pre>';
?>
	<form action="modificarExpediente2.php" method="post" enctype="multipart/form-data">
		<label>Nombre: </label><input type="text" name="nombre" value="<?php echo $expedientes[$id]['nombre']; ?>"><br>
		<label>Apellido 1: </label><input type="text" name="ape1" value="<?php echo $expedientes[$id]['ape1']; ?>"><br>
		<label>Apellido 2: </label><input type="text" name="ape2"value="<?php echo $expedientes[$id]['ape2']; ?>"><br>
		<label>Idiomas: </label>
		<?php 
			/*if (in_array('es',$expedientes[$id]['idiomas'])){
				$checked = 'checked';
			} else {
				$checked = '';
			}*/		
			$checked = in_array('es', $expedientes[$id]['idiomas']) ? 'checked' : '';
		?>
		<input type="checkbox" value="es" name="idiomas[]" <?php echo $checked; ?>>Castellano
		<?php 	
			$checked = in_array('ca', $expedientes[$id]['idiomas']) ? 'checked' : '';
		?>	
		<input type="checkbox" value="ca" name="idiomas[]" <?php echo $checked; ?>>Català
		<?php 		
			$checked = in_array('fr', $expedientes[$id]['idiomas']) ? 'checked' : '';
		?>	
		<input type="checkbox" value="fr" name="idiomas[]"  <?php echo $checked; ?>>Francés
		<?php 		
			$checked = in_array('en', $expedientes[$id]['idiomas']) ? 'checked' : '';
		?>			
		<input type="checkbox" value="en" name="idiomas[]" <?php echo $checked; ?>>Inglés<br>
		<label>Genero: </label>
		<?php 		
			$checked = $expedientes[$id]['genero']=='Hombre' ? 'checked' : '';
		?>			
		<input type="radio" value="Hombre" name="genero" <?php echo $checked; ?>>Hombre
		<?php 		
			$checked = $expedientes[$id]['genero']=='Mujer' ? 'checked' : '';
		?>			
		<input type="radio" value="Mujer" name="genero" <?php echo $checked; ?>>Mujer
		<?php 		
			$checked = $expedientes[$id]['genero']=='Otro' ? 'checked' : '';
		?>				
		<input type="radio" value="Otro" name="genero"  <?php echo $checked; ?>>Otro
		<hr>
		<span>Sube una foto:</span>
        <input type="file" name="fichero1" />
		<hr>
		<div class="materia">
			<h2>Ciencias</h2>
			<input type="hidden" name="materias[0][nombre]" value="Ciencias">
			Nota: 
			<select name="materias[0][nota]">
				<?php 		
					$selected = $expedientes[$id]['materias'][0]['nota']=='suspendido' ? 'selected' : '';
				?>	
				<option value="suspendido" <?php echo $selected; ?>>Suspendido</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][0]['nota']=='aprobado' ? 'selected' : '';
				?>					
				<option value="aprobado" <?php echo $selected; ?>>Aprobado</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][0]['nota']=='notable' ? 'selected' : '';
				?>									
				<option value="notable" <?php echo $selected; ?>>Notable</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][0]['nota']=='sobrasaliente' ? 'selected' : '';
				?>						
				<option value="sobrasaliente" <?php echo $selected; ?>>Sobresaliente</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][0]['nota']=='MH' ? 'selected' : '';
				?>						
				<option value="MH" <?php echo $selected; ?>>Matrícula de honor</option>
			</select><br>
			Comentarios:
			<textarea name="materias[0][comentario]" placeholder="Comentarios"><?php echo  $expedientes[$id]['materias'][0]['comentario']?></textarea>
		</div>
		<div class="materia">
			<h2>Matematicas</h2>
			<input type="hidden" name="materias[1][nombre]" value="Matematicas">
			Nota: 
			<select name="materias[1][nota]">
				<?php 		
					$selected = $expedientes[$id]['materias'][1]['nota']=='suspendido' ? 'selected' : '';
				?>	
				<option value="suspendido" <?php echo $selected; ?>>Suspendido</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][1]['nota']=='aprobado' ? 'selected' : '';
				?>					
				<option value="aprobado" <?php echo $selected; ?>>Aprobado</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][1]['nota']=='notable' ? 'selected' : '';
				?>									
				<option value="notable" <?php echo $selected; ?>>Notable</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][1]['nota']=='sobrasaliente' ? 'selected' : '';
				?>						
				<option value="sobrasaliente" <?php echo $selected; ?>>Sobresaliente</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][1]['nota']=='MH' ? 'selected' : '';
				?>						
				<option value="MH" <?php echo $selected; ?>>Matrícula de honor</option>
	
			</select><br>
			Comentarios:
			<textarea name="materias[1][comentario]" placeholder="Comentarios"><?php echo  $expedientes[$id]['materias'][1]['comentario']?></textarea>
		</div>		
		<div class="materia">
			<h2>Historia</h2>
			<input type="hidden" name="materias[2][nombre]" value="Historia">
			Nota: 
			<select name="materias[2][nota]">
				<?php 		
					$selected = $expedientes[$id]['materias'][2]['nota']=='suspendido' ? 'selected' : '';
				?>	
				<option value="suspendido" <?php echo $selected; ?>>Suspendido</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][2]['nota']=='aprobado' ? 'selected' : '';
				?>					
				<option value="aprobado" <?php echo $selected; ?>>Aprobado</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][2]['nota']=='notable' ? 'selected' : '';
				?>									
				<option value="notable" <?php echo $selected; ?>>Notable</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][2]['nota']=='sobrasaliente' ? 'selected' : '';
				?>						
				<option value="sobrasaliente" <?php echo $selected; ?>>Sobresaliente</option>
				<?php 		
					$selected = $expedientes[$id]['materias'][2]['nota']=='MH' ? 'selected' : '';
				?>						
				<option value="MH" <?php echo $selected; ?>>Matrícula de honor</option>
	
			</select><br>
			Comentarios:
			<textarea name="materias[2][comentario]" placeholder="Comentarios"><?php echo  $expedientes[$id]['materias'][2]['comentario']?></textarea>
		</div>		
		
	<br><input type="submit" value="Enviar" name="botonSubmit">	
	</form>
<?php
pie();
?>