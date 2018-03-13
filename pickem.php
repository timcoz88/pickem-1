<?php require_once ("cabecalho.php");?>

<form action="#" method="post">
	<div class="form-group">
		<label for="exampleFormControlSelect1">Competition</label> <select
			class="form-control" id="exampleFormControlSelect1">
			<option>Atlantic Regional</option>
		</select> <label for="exampleFormControlSelect1">Event</label> <select
			class="form-control" id="exampleFormControlSelect1">
			<option>Event 1</option>
			<option>Event 2</option>
			<option>Event 3</option>
			<option>Event 4</option>
			<option>Event 5</option>
		</select> <label for="exampleFormControlSelect1">Female Athlete</label> <select
			class="form-control" id="exampleFormControlSelect1">
			<option>Name</option>

		</select> <label for="exampleFormControlSelect1">Male Athlete</label> <select
			class="form-control" id="exampleFormControlSelect1">
			<option>Name</option>

		</select>
	</div>


	<button type="submit" class="btn btn-primary">Pick</button>
</form>


<script>
  var l = document.getElementById('list');
  l.setAttribute('size',l.childElementCount+l.length);
</script>

<?php require_once ("rodape.php"); ?>