<?php require_once ("cabecalho.php");?>

<form action="#" method="post">
	<div class="form-group">
		<label for="exampleFormControlSelect1">Competition</label> <select
			class="form-control" id="exampleFormControlSelect1">
			<option>Atlantic Regional</option>
			<option>California Regional</option>
			<option>Central Regional</option>
			<option>East</option>
			<option>Europe</option>
			<option>South</option>
			<option>Latin America</option>
			<option>West</option>
			<option>Meridional</option>
		</select>
	</div>
	<div class="form-group">
		<label for="exampleFormControlSelect1">Event</label> <select
			class="form-control" id="exampleFormControlSelect1">
			<option>Event 1</option>
			<option>Event 2</option>
			<option>Event 3</option>
			<option>Event 4</option>
			<option>Event 5</option>
		</select>
	</div>

<div class="col-sm-6">

		<div class="form-group ">
			<label for="exampleFormControlSelect2">Female Athletes</label> <select
				class="form-control" id="exampleFormControlSelect2" size="20px">
				<option>TIA-CLAIR TOOMEY</option>
				<option>KARA SAUNDERS</option>
				<option>ANNIE THORISDOTTIR</option>
				<option>RAGNHEIÐUR SARA SIGMUNDSDOTTIR</option>
				<option>KATRIN TANJA DAVIDSDOTTIR</option>
				<option>TENNIL BEUERLEIN</option>
				<option>KRISTIN HOLTE</option>
				<option>JAMIE GREENE</option>
				<option>SAMANTHA BRIGGS</option>
				<option>KARI PEARCE</option>
			</select>
		</div>


</div>


<div class="col-sm-6">

		<div class="form-group">
			<label for="exampleFormControlSelect2">Male Athletes</label> <select
				class="form-control" id="exampleFormControlSelect2" size="20px">
				<option>MATHEW FRASER</option>
				<option>BRENT FIKOWSKI</option>
				<option>RICKY GARARD</option>
				<option>PATRICK VELLNER</option>
				<option>NOAH OHLSEN</option>
				<option>BJÖRGVIN KARL GUÐMUNDSSON</option>
				<option>SCOTT PANCHIK</option>
				<option>BEN SMITH</option>
				<option>ALEX ANDERSON</option>
				<option>JONNE KOSKI</option>
			</select>
		</div>

</div>
<button type="submit" class="btn btn-primary">Pick</button>
</form>


<script>
  var l = document.getElementById('list');
  l.setAttribute('size',l.childElementCount+l.length);
</script>

<?php require_once ("rodape.php"); ?>