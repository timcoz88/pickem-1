<?php
require_once ("global.php");
require_once ("cabecalho.php");

try {
    $regioes = regiaoDao::listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}
try {
    $atletas = atletaDao::listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}
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
    $grupos = grupoDao::listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}
try {
    $usuario_id = Sessao::getSessao("usuario_id");
} catch (Exception $e) {
    Erro::trataErro($e);
}
try {
    $palpites = palpiteDao::listarPorUsuario($usuario_id);
} catch (Exception $e) {
    Erro::trataErro($e);
}
?>

<h3>Pick</h3>
<form role="form" action="pickem-post.php" method="post">
	<div class="form-group">
		<input type="hidden" name="idUsuario" value="<?php echo $usuario_id ?>"> 
		
		<label for="selectGroup">Group</label>
		<select class="form-control" name="idGrupo" id="selectGroup">
			<option value="" disabled selected hidden>Select Group...</option>
	<?php foreach ($grupos as $grupo): ?>
			<option value="<?php echo $grupo['idGrupo']?>"><?php echo $grupo['nomeGrupo']?></option>
	<?php endforeach;?>
		</select> 
		
		<label for="selectCompetition">Competition</label> 
		<select	class="form-control" name="idCompeticao" id="selectCompetition">
			<option value="" disabled selected hidden>Select Competition...</option>
	<?php foreach ($competicoes as $competicao): ?>
			<option value="<?php echo $competicao['idCompeticao']?>"><?php echo $competicao['nomeCompeticao']?></option>
	<?php endforeach;?>
		</select> 
		
		<label for="exampleFormControlSelect1">Event</label> 
		<select	class="form-control" name="idMetcon" id="exampleFormControlSelect1">
			<option value="" disabled selected hidden>Select Event...</option>
	<?php foreach ($metcon as $wod): ?>
			<option value="<?php echo $wod['idMetcon']?>"><?php echo $wod['nomeMetcon']?></option>
	<?php endforeach;?>
		</select>
		
		<label for="exampleFormControlSelect1">Division</label>
		<select class="form-control" name="idDivisao"
			id="exampleFormControlSelect1">
			<option value="" disabled selected hidden>Select Division...</option>
			<option value="0">Female</option>
			<option value="1">Male</option>
	
		</select>
		
		<label for="exampleFormControlSelect1">Athlete</label>
		<select class="form-control" name="idAtleta"
			id="exampleFormControlSelect1">
			<option value="" disabled selected hidden>Select Athlete...</option>
	<?php foreach ($atletas as $atleta): ?>
			<option value="<?php echo $atleta['idAtleta']?>"><?php echo $atleta['nomeAtleta']." ".$atleta['sobrenomeAtleta']?></option>
	<?php endforeach;?>
		</select>
		
	</div>


	<button type="submit" class="btn btn-primary">Pick</button>
</form>
<br />
<h3>My Picks</h3>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th>Competition</th>
					<th>Event</th>
					<th>Name</th>
					<th class="acao">Edit</th>
					<th class="acao">Delete</th>
				</tr>
			</thead>
			<tbody>
                <?php foreach ($palpites as $palpite): ?>
                    <tr>
					<td><a href="" class="btn btn-link"><?php echo $palpite['nomeCompeticao'] ?></a></td>
					<td><a href="" class="btn btn-link"><?php echo $palpite['nomeMetcon'] ?></a></td>
					<td><a href="" class="btn btn-link"><?php echo $palpite['nomeAtleta']." ".$palpite['sobrenomeAtleta']  ?></a></td>
					<td><a href="" class="btn btn-info">Edit</a></td>
					<td><a href="" class="btn btn-danger">Delete</a></td>
				</tr>
                <?php endforeach ?>
            </tbody>
		</table>
	</div>
</div>


<script>
  var l = document.getElementById('list');
  l.setAttribute('size',l.childElementCount+l.length);
</script>

<?php require_once ("rodape.php"); ?>