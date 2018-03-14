<?php require_once ("cabecalho.php");
require_once 'global.php';?>
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
?>

<form action="#" method="post">
	<div class="form-group">
		<label for="selectCompetition">Competition</label> <select
			class="form-control" id="selectCompetition">
			<option value="" disabled selected hidden>Select Competition...</option>
	<?php foreach ($regioes as $regiao): ?>
			<option value="<?php echo $regiao['id']?>"><?php echo $regiao['nome']?></option>
	<?php endforeach;?>
			
		</select> <label for="exampleFormControlSelect1">Event</label> <select
			class="form-control" id="exampleFormControlSelect1">
			<option value="" disabled selected hidden>Select Event...</option>
			<option>Event 1</option>
			<option>Event 2</option>
			<option>Event 3</option>
			<option>Event 4</option>
			<option>Event 5</option>
		</select> 
		
		<label for="exampleFormControlSelect1">Female Athlete</label> <select
			class="form-control" id="exampleFormControlSelect1">
			<option value="" disabled selected hidden>Select Female Athlete...</option>
	<?php foreach ($atletas as $atleta): ?>
			<option value="<?php echo $atleta['id']?>"><?php echo $atleta['nome']." ".$atleta['sobrenome']?></option>
	<?php endforeach;?>

		</select> <label for="exampleFormControlSelect1">Male Athlete</label> <select
			class="form-control" id="exampleFormControlSelect1">
			<option value="" disabled selected hidden>Select Male Athlete...</option>
	<?php foreach ($atletas as $atleta): ?>
			<option value="<?php echo $atleta['id']?>"><?php echo $atleta['nome']." ".$atleta['sobrenome']?></option>
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