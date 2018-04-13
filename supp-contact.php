<?php
require_once ("global.php");
require_once ("cabecalho.php");
?>



<div class="row">
	<div class="col-md-8">
		<form action="supp-contact-post.php" method="post">
			<div class="form-group">

				Name: <input type="text" name="nome" class="form-control"> Email: <input
					type="email" name="email" class="form-control"> Message:
				<textarea class="form-control" name="mensagem"></textarea>
				<br />
				<div class="g-recaptcha"
					data-sitekey="6Lfs5VIUAAAAAOM_qFdT1SnAfX5u4kAGSFT-meLy"></div>
				<br />
				<button type="submit" class="btn btn-primary">Send</button>

			</div>


		</form>

	</div>
</div>


<?php require_once ("rodape.php"); ?>