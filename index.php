<?php
require_once ("cabecalho.php");

if (isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
    
    
} else {
    require_once ("index-main.php");?>
<!-- 
<div class="starter-template">
	<h1>CF PickEm</h1>
	<p class=lead>
		Escrever uma descrição da página... <br />"Lorem ipsum dolor sit amet,
		consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
		labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
		exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
		Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
		dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est
		laborum."
	</p>

	<a href="user-register.php" class="btn btn-secondary btn-lg" role="button">Register</a>

</div>
 -->

<?php }
require_once ("rodape.php"); ?>