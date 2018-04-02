<?php

require_once ("cabecalho.php");
require_once 'global.php';
?>
<?php
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
    $competicoes = competicaoDAO::listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}
try {
    $metcon = metconDAO::listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}
?>

<form action="pickem-post.php" method="post">
	<div class="form-group">
	<!-- QUANDO CRIAR AS OPÇÕES DE GRUPOS
		<label for="selectGroup">Group</label> <select
			class="form-control" id="selectGroup">
			<option value="" disabled selected hidden>Select Group...</option>
	<?php //foreach ($grupos as $grupo): ?>
			<option value="<?php // echo $grupo['idGrupo']?>"><?php // echo $grupo['nomeGrupo']?></option>
	<?php //endforeach;?>
		-->
		 	
		</select> <label for="selectCompetition">Competition</label> <select
			class="form-control" id="selectCompetition">
			<option value="" disabled selected hidden>Select Competition...</option>
	<?php foreach ($competicoes as $competicao): ?>
			<option value="<?php echo $competicao['idCompeticao']?>"><?php echo $competicao['nomeCompeticao']?></option>
	<?php endforeach;?>
			
		</select> <label for="exampleFormControlSelect1">Event</label> <select
			class="form-control" id="exampleFormControlSelect1">
			<option value="" disabled selected hidden>Select Event...</option>
	<?php foreach ($metcon as $wod): ?>
			<option value="<?php echo $wod['idMetcon']?>"><?php echo $wod['nomeMetcon']?></option>
	<?php endforeach;?>
		</select> <label for="exampleFormControlSelect1">Female Athlete</label>
		<select class="form-control" id="exampleFormControlSelect1">
			<option value="" disabled selected hidden>Select Female Athlete...</option>
	<?php foreach ($atletas as $atleta): ?>
			<option value="<?php echo $atleta['idFemaleAtleta']?>"><?php echo $atleta['nomeAtleta']." ".$atleta['sobrenomeAtleta']?></option>
	<?php endforeach;?>

		</select> <label for="exampleFormControlSelect1">Male Athlete</label>
		<select class="form-control" id="exampleFormControlSelect1">
			<option value="" disabled selected hidden>Select Male Athlete...</option>
	<?php foreach ($atletas as $atleta): ?>
			<option value="<?php echo $atleta['idMaleAtleta']?>"><?php echo $atleta['nomeAtleta']." ".$atleta['sobrenomeAtleta']?></option>
	<?php endforeach;?>

		</select>
	</div>


	<button type="submit" class="btn btn-primary">Pick</button>
</form>


<script>
  var l = document.getElementById('list');
  l.setAttribute('size',l.childElementCount+l.length);
</script>

<?php require_once ("rodape.php"); ?>