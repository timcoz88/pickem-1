<?php require_once ("cabecalho.php"); ?>



<div class="inner-bg">
	<div class="container">
		<div class="row">
		<div class="span6" style="float: none; margin: 0 auto;">
			<div class="col">
				<div class="form-box">
					<div class="form-top">
						<div class="form-top-left">
							<h3>Sign up now</h3>
							<p>Fill in the form below to get instant access:</p>
						</div>
						<div class="form-top-right">
							<i class="fa fa-pencil"></i>
						</div>
					</div>
					<div class="form-bottom">
						<form role="form" action="user-register-post.php" method="post"
							class="registration-form">
							<div class="form-group">
								<label class="sr-only" for="form-first-name">First name</label>
								<input type="text" name="nome" placeholder="First name..."
									class="form-first-name form-control" id="form-first-name">
							</div>
							<div class="form-group">
								<label class="sr-only" for="form-last-name">Last name</label> <input
									type="text" name="sobrenome" placeholder="Last name..."
									class="form-last-name form-control" id="form-last-name">
							</div>
							<div class="form-group">
								<label class="sr-only" for="form-email">Email</label> <input
									type="text" name="email" placeholder="Email..."
									class="form-email form-control" id="form-email">
							</div>
							<div class="form-group">
								<label class="sr-only" for="form-password">Password</label> <input
									type="text" name="senha" placeholder="Password..."
									class="form-password form-control" id="form-password">
							</div>
							<div class="form-group">
								<label class="sr-only" for="form-password-confirm">Confirm
									password</label> <input type="text" name="confirma-senha"
									placeholder="Confirm password"
									class="form-password-confirm form-control"
									id="form-password-confirm">
							</div>
							<button type="submit" class="btn btn-primary">Sign me up!</button>
						</form>
					</div>
				</div>

			</div>
			</div>
		</div>

	</div>
</div>

</div>






<?php require_once ("rodape.php"); ?>