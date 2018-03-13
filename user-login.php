<?php require_once ("cabecalho.php"); ?>


<div class="inner-bg">
	<div class="container">

		<div class="row">
		<div class="span6" style="float: none; margin: 0 auto;">
			<div class="col">

				<div class="form-box">
					<div class="form-top">
						<div class="form-top-left">
							<h3>Login</h3>
							<p>Enter username and password to log on:</p>
						</div>
						<div class="form-top-right">
							<i class="fa fa-key"></i>
						</div>
					</div>
					<div class="form-bottom">
						<form role="form" action="login.php" method="post"
							class="login-form">
							<div class="form-group">
								<label class="sr-only" for="form-email">E-mail</label> <input
									type="email" name="email" placeholder="email@example.com"
									class="form-email form-control" id="form-email">
							</div>
							<div class="form-group">
								<label class="sr-only" for="form-password">Password</label> <input
									type="password" name="senha" placeholder="Password..."
									class="form-password form-control" id="form-password">
							</div>
							<button type="submit" class="btn btn-primary">Sign in!</button>
						</form>
					</div>
				</div>

				<div class="social-login">
					<br />
					<h3>...or login with:</h3>
					<div class="social-login-buttons">
						<a class="btn btn-link-1 btn-link-1-facebook" href="#"> <i
							class="fa fa-facebook"></i> Facebook
						</a> <a class="btn btn-link-1 btn-link-1-twitter" href="#"> <i
							class="fa fa-twitter"></i> Twitter
						</a> <a class="btn btn-link-1 btn-link-1-google-plus" href="#"> <i
							class="fa fa-google-plus"></i> Google
						</a>
					</div>
				</div>

			</div>
</div>


		</div>

	</div>
</div>

</div>



<?php require_once ("rodape.php"); ?>