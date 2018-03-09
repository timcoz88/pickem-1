<?php require_once ("cabecalho.php"); ?>


<h1>Formulário de usuário</h1>
<form action="adiciona-usuario.php" method="post">
	<table class="table">
<tr>
	<td>Nome</td>
	<td>
		<input class="form-control" type="text" name="nome" 
			value="<?=$produto->getNome()?>">
	</td>
</tr>
<tr>
	<td>Preço</td>
	<td>
		<input class="form-control" type="number" step="0.01" name="preco" 
			value="<?=$produto->getPreco()?>">
	</td>
</tr>
<tr>
	<td>Descrição</td>
	<td>
		<textarea class="form-control" name="descricao"><?=$produto->getDescricao()?></textarea>
	</td>
</tr>
<tr>
	<td></td>
	<td><input type="checkbox" name="usado" <?=$produto->isUsado()?> value="true"> Usado
</tr>
<tr>
	<td>Categoria</td>
	<td>
		<select name="categoria_id" class="form-control">
			<?php
			foreach($categorias as $categoria) : 
				$essaEhACategoria = $produto->getCategoria()->getId() == $categoria->getId();
				$selecao = $essaEhACategoria ? "selected='selected'" : "";
			?>
				<option value="<?=$categoria->getId()?>" <?=$selecao?>>
					<?=$categoria->getNome()?>
				</option>
			<?php 
			endforeach
			?>
		</select>
	</td>
</tr>
<tr>
    <td>Tipo do produto</td>
    <td>
        <select name="tipoProduto" class="form-control">
            <?php
            $tipos = array("Produto", "Livro Fisico", "E-book");
            foreach($tipos as $tipo) : 
                $tipoSemEspaco = str_replace(" ", "", $tipo);
                $esseEhOTipo = get_class($produto)  == $tipo;
                $selecao = $esseEhOTipo ? "selected='selected'" : "";
            ?>
            	<?php if ($tipo == "Livro Fisico") : ?>
                    <optgroup label="Livros">
                <?php endif ?>
                        <option value="<?=$tipoSemEspaco?>" <?=$selecaoTipo?>>
                            <?=$tipo?>
                        </option>
                <?php if ($tipo == "Ebook") : ?>
                    </optgroup>
                <?php endif ?>
            <?php endforeach ?>
        </select>
    </td>
<tr>
    <td>ISBN (caso seja um Livro)</td>
    <td>
        <input type="text" name="isbn" class="form-control" 
            value="<?php if ($produto->temIsbn()) { echo $produto->getIsbn(); } ?>" >
    </td>
</tr>
<tr>
    <td>Taxa Impresão (caso seja um Livro Fisico)</td>
    <td>
        <input type="text" name="taxaImpressao" class="form-control" 
            value="<?php if ($produto->temTaxaImpressao()) { echo $produto->getIsbn(); } ?>" >
    </td>
</tr>
<tr>
    <td>WaterMark (caso seja um Ebook)</td>
    <td>
        <input type="text" name="waterMark" class="form-control" 
            value="<?php if ($produto->temWaterMark()) { echo $produto->getIsbn(); } ?>" >
    </td>
</tr>

<tr>
			<td>
				<button class="btn btn-primary" type="submit">Cadastrar</button>
			</td>
		</tr>
	</table>
</form>






<?php require_once ("rodape.php"); ?>