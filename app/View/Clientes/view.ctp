<div class="row-fluid sortable ui-sortable">
	<div class="box span7">
		<div class="box-header well">
			<h2><i class="icon-search"></i> Cliente </h2>
			<div class="box-icon">
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i></a>
				<a class="btn btn-close btn-round" href="#"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="box-content">
				<fieldset>
					<legend> Dados Pessoais </legend>
					<strong> Nome: </strong> <?php echo h( $cliente['Cliente']['nome']  ? $cliente['Cliente']['nome'] : "- - - -" );?>
					<br/>
					<strong> Apelido: </strong> <?php echo h( $cliente['Cliente']['apelido']  ? $cliente['Cliente']['apelido'] : "- - - -" );?>
					<br/>
					<strong> Telefone Celular: </strong> <?php echo h( $cliente['Cliente']['fone_celular'] ? $cliente['Cliente']['fone_celular'] : "- - - -" );?>
					<br/>
					<strong> Telefone Fixo: </strong> <?php echo h( $cliente['Cliente']['fone_fixo']  ? $cliente['Cliente']['fone_fixo'] : "- - - -" );?>
					<br/>
					<strong> Telefone Comercial : </strong> <?php echo h( $cliente['Cliente']['fone_comercial'] ? $cliente['Cliente']['fone_comercial'] : "- - - -"  );?>
				</fieldset><br/><br/>
				<fieldset>
					<legend> Dados de Endereço </legend>
					<strong> Rua: </strong> <?php echo h( ucfirst( $cliente['Endereco']['rua'] ));?>
					<br/>
					<strong> Número: </strong> <?php echo h( $cliente['Endereco']['numero'] );?>
					<br/>
					<strong> Complemento: </strong> <?php echo h( $cliente['Endereco']['complemento'] ? $cliente['Endereco']['complemento'] : "- - - -" );?>
					<br/>
					<strong> Bairro: </strong> <?php echo h( ucfirst( $cliente['Endereco']['bairro'] ) );?>
					<br/>
					<strong> Cidade: </strong> <?php echo h( ucfirst( $cliente['Cidade']['nome'] ));?>
					<br/>
					<strong> Observação: </strong> <?php echo h( ucfirst( $cliente['Endereco']['observacao'] ));?>
					<br/>
					<i>
					<?php
						echo "<br/> Criado em ";
						$date = new DateTime($cliente['Cliente']['created']);
						echo $date->format('d/m/Y H:i');
						echo "<br/> Modificado em ";
						$date = new DateTime($cliente['Cliente']['modified']);
						echo $date->format('d/m/Y H:i');
					?>
					</i>
				</fieldset>
			</div>
		</div>
	</div>
</div>