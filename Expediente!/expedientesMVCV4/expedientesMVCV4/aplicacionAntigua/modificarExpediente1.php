<?php
require_once 'expedienteClass.php';
require_once 'expedientesArchivadosClass.php';
$expedientesObj = new expedientesArchivados();
//recuperamos el id pasado por parametro
$id = $_GET['id'];
$exp = $expedientesObj->getExpediente($id);




require_once '../comun/libreria.php';
cabecera('Modificar expediente','');
//echo '<pre>';
//print_r($exp);
//echo '</pre>';
?>
	<form action="modificarExpediente2Controlador.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name='id' value=<?php echo $id; ?>> 
		<input type="hidden" name='foto' value=<?php echo $exp->getFoto(); ?>> 
		<label>Nombre: </label><input type="text" name="nombre" value="<?php echo $exp->getNombre(); ?>"><br>
		<label>Apellido 1: </label><input type="text" name="ape1" value="<?php echo $exp->getApe1(); ?>"><br>
		<label>Apellido 2: </label><input type="text" name="ape2"value="<?php echo $exp->getApe2(); ?>"><br>
		<label>Idiomas: </label>
		<?php 
			/*if (in_array('es',$expedientes[$id]['idiomas'])){
				$checked = 'checked';
			} else {
				$checked = '';
			}*/		
			$checked = in_array('es', $exp->getIdiomas()) ? 'checked' : '';
		?>
		<input type="checkbox" value="es" name="idiomas[]" <?php echo $checked; ?>>Castellano
		<?php 	
			$checked = in_array('ca', $exp->getIdiomas()) ? 'checked' : '';
		?>	
		<input type="checkbox" value="ca" name="idiomas[]" <?php echo $checked; ?>>Català
		<?php 		
			$checked = in_array('fr', $exp->getIdiomas()) ? 'checked' : '';
		?>	
		<input type="checkbox" value="fr" name="idiomas[]"  <?php echo $checked; ?>>Francés
		<?php 		
			$checked = in_array('en', $exp->getIdiomas()) ? 'checked' : '';
		?>			
		<input type="checkbox" value="en" name="idiomas[]" <?php echo $checked; ?>>Inglés<br>
		<label>Genero: </label>
		<?php 		
			$checked = $exp->getGenero()=='Hombre' ? 'checked' : '';
		?>			
		<input type="radio" value="Hombre" name="genero" <?php echo $checked; ?>>Hombre
		<?php 		
			$checked = $exp->getGenero()=='Mujer' ? 'checked' : '';
		?>			
		<input type="radio" value="Mujer" name="genero" <?php echo $checked; ?>>Mujer
		<?php 		
			$checked =$exp->getGenero()=='Otro' ? 'checked' : '';
		?>				
		<input type="radio" value="Otro" name="genero"  <?php echo $checked; ?>>Otro
		<hr>
		<img src='imgpeques/<?php echo $exp->getFoto(); ?>'>
		<span>Modifica la foto:</span>
        <input type="file" name="fichero1" />
		<hr>
		<div class="materia">
			<h2>Ciencias</h2>
			<input type="hidden" name="materias[0][nombre]" value="Ciencias">
			Nota: 
			<select name="materias[0][nota]">
				<?php 		
					$selected = $exp->getMaterias()[0]['nota']=='suspendido' ? 'selected' : '';
				?>	
				<option value="suspendido" <?php echo $selected; ?>>Suspendido</option>
				<?php 		
					$selected = $exp->getMaterias()[0]['nota']=='aprobado' ? 'selected' : '';
				?>					
				<option value="aprobado" <?php echo $selected; ?>>Aprobado</option>
				<?php 		
					$selected = $exp->getMaterias()[0]['nota']=='notable' ? 'selected' : '';
				?>									
				<option value="notable" <?php echo $selected; ?>>Notable</option>
				<?php 		
					$selected = $exp->getMaterias()[0]['nota']=='sobrasaliente' ? 'selected' : '';
				?>						
				<option value="sobrasaliente" <?php echo $selected; ?>>Sobresaliente</option>
				<?php 		
					$selected = $exp->getMaterias()[0]['nota']=='MH' ? 'selected' : '';
				?>						
				<option value="MH" <?php echo $selected; ?>>Matrícula de honor</option>
			</select><br>
			Comentarios:
			<textarea name="materias[0][comentario]" placeholder="Comentarios"><?php echo  $exp->getMaterias()[0]['comentario']?></textarea>
		</div>
		<div class="materia">
			<h2>Matematicas</h2>
			<input type="hidden" name="materias[1][nombre]" value="Matematicas">
			Nota: 
			<select name="materias[1][nota]">
				<?php 		
					$selected = $exp->getMaterias()[1]['nota']=='suspendido' ? 'selected' : '';
				?>	
				<option value="suspendido" <?php echo $selected; ?>>Suspendido</option>
				<?php 		
					$selected = $exp->getMaterias()[1]['nota']=='aprobado' ? 'selected' : '';
				?>					
				<option value="aprobado" <?php echo $selected; ?>>Aprobado</option>
				<?php 		
					$selected = $exp->getMaterias()[1]['nota']=='notable' ? 'selected' : '';
				?>									
				<option value="notable" <?php echo $selected; ?>>Notable</option>
				<?php 		
					$selected = $exp->getMaterias()[1]['nota']=='sobrasaliente' ? 'selected' : '';
				?>						
				<option value="sobrasaliente" <?php echo $selected; ?>>Sobresaliente</option>
				<?php 		
					$selected = $exp->getMaterias()[1]['nota']=='MH' ? 'selected' : '';
				?>						
				<option value="MH" <?php echo $selected; ?>>Matrícula de honor</option>
	
			</select><br>
			Comentarios:
			<textarea name="materias[1][comentario]" placeholder="Comentarios"><?php echo  $exp->getMaterias()[1]['comentario']?></textarea>
		</div>		
		<div class="materia">
			<h2>Historia</h2>
			<input type="hidden" name="materias[2][nombre]" value="Historia">
			Nota: 
			<select name="materias[2][nota]">
				<?php 		
					$selected = $exp->getMaterias()[2]['nota']=='suspendido' ? 'selected' : '';
				?>	
				<option value="suspendido" <?php echo $selected; ?>>Suspendido</option>
				<?php 		
					$selected = $exp->getMaterias()[2]['nota']=='aprobado' ? 'selected' : '';
				?>					
				<option value="aprobado" <?php echo $selected; ?>>Aprobado</option>
				<?php 		
					$selected = $exp->getMaterias()[2]['nota']=='notable' ? 'selected' : '';
				?>									
				<option value="notable" <?php echo $selected; ?>>Notable</option>
				<?php 		
					$selected = $exp->getMaterias()[2]['nota']=='sobrasaliente' ? 'selected' : '';
				?>						
				<option value="sobrasaliente" <?php echo $selected; ?>>Sobresaliente</option>
				<?php 		
					$selected = $exp->getMaterias()[2]['nota']=='MH' ? 'selected' : '';
				?>						
				<option value="MH" <?php echo $selected; ?>>Matrícula de honor</option>
	
			</select><br>
			Comentarios:
			<textarea name="materias[2][comentario]" placeholder="Comentarios"><?php echo  $exp->getMaterias()[2]['comentario']?></textarea>
		</div>		
		
	<br><input type="submit" value="Guardar" name="botonSubmit">	
	</form>
<?php
pie();
?>