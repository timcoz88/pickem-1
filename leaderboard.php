<?php
require_once ("global.php");
require_once ("cabecalho.php");
try {
    $competicoes = competicaoDao::listarAtivas();
} catch (Exception $e) {
    Erro::trataErro($e);
}
try {
    $metcon = metconDao::listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}
try {
    $resultados = resultadoDao::classificacao();
} catch (Exception $e) {
    Erro::trataErro($e);
}
?>


<div class="form-group">
<label for="selectCompetition">Competition</label> 
		<select	class="form-control" name="idCompeticao" id="selectCompetition">
			<option value="" disabled selected hidden>Select Competition...</option>
			<option value="">ALL</option>
	<?php foreach ($competicoes as $competicao): ?>
			<option value="<?php echo $competicao['idCompeticao']?>"><?php echo $competicao['nomeCompeticao']?></option>
	<?php endforeach;?>
		</select> 
</div>

<div class="table-responsive"> 
<table class="table table-striped table-bordered table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Points</th>
	<?php foreach ($metcon as $wod): ?>
			<th scope="col" ><?php echo $wod['nomeMetcon']?></option>
	<?php endforeach;?>
			
		</tr>
	</thead>
	<tbody>
		<tr>
			
	<?php foreach ($resultados as $resultado):
	$i = 1;?>
			<th scope="row"><?php echo $i?></th>
			<th scope="col" ><?php echo $resultado['nomeUsuario']." ".$resultado['sobrenomeUsuario']?></option>
			<th scope="col" >TOTAL</option>
		<?php foreach ($metcon as $wod): ?>
			<td><?php 
			
			echo $resultado[$wod['idMetcon']];
			     ?>
			</td>
		<?php endforeach; $i = $i +1;?>
			
			
	<?php endforeach;?>
			
			
		</tr>
		<tr>
			<th scope="row">2</th>
			<td>NICK ROBLES</td>
			<td>228</td>
			<td>22 pts</td>
			<td>39 pts</td>
			<td>61 pts</td>
			<td>26 pts</td>
			<td>47 pts</td>
			<td>33 pts</td>
		</tr>
		<tr>
			<th scope="row">3</th>
			<td>JOSH KYSER</td>
			<td>214</td>
			<td>29 pts</td>
			<td>41 pts</td>
			<td>31 pts</td>
			<td>35 pts</td>
			<td>53 pts</td>
			<td>25 pts</td>
		</tr>
		<tr>
			<th scope="row">4</th>
			<td>JORDAN JIUNTA</td>
			<td>206</td>
			<td>26 pts</td>
			<td>24 pts</td>
			<td>33 pts</td>
			<td>29 pts</td>
			<td>49 pts</td>
			<td>45 pts</td>
		</tr>
		<tr>
			<th scope="row">5</th>
			<td>TYLER TOSUNIAN</td>
			<td>203</td>
			<td>18 pts</td>
			<td>65 pts</td>
			<td>21 pts</td>
			<td>25 pts</td>
			<td>31 pts</td>
			<td>43 pts</td>
		</tr>
		<tr>
			<th scope="row">6</th>
			<td>ANDRE FASSLER</td>
			<td>203</td>
			<td>21 pts</td>
			<td>37 pts</td>
			<td>47 pts</td>
			<td>22 pts</td>
			<td>37 pts</td>
			<td>39 pts</td>
		</tr>
		<tr>
			<th scope="row">7</th>
			<td>AMADOR ARTEAGA</td>
			<td>200</td>
			<td>31 pts</td>
			<td>25 pts</td>
			<td>25 pts</td>
			<td>37 pts</td>
			<td>35 pts</td>
			<td>47 pts</td>
		</tr>

	</tbody>
</table>
</div>



<?php require_once ("rodape.php"); ?>