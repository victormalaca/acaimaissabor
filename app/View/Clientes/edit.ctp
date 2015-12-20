<?php echo $this->Html->script('cliente');?>

<div class="row-fluid sortable ui-sortable">
	<div class="box span12">
		<div data-original-title="" class="box-header well">
			<h2><i class="icon-edit"></i> Editar Cliente </h2>
			<div class="box-icon">
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i></a>
				<a class="btn btn-close btn-round" href="#"><i class="icon-remove"></i></a>
			</div>
		</div>

		<div class="box-content">
			<?php echo $this->Form->create('Cliente', array( 'class' => 'form-horizontal' )); ?>
			<div class="span5 left">
					<fieldset>
						<legend> Dados Pessoais </legend>
						<div class="control-group">
							<label class="control-label" for="ClienteNome"> Nome </label>
							<div class="controls">
								<?php echo $this->Form->hidden('Cliente.id'); ?>
								<?php echo $this->Form->input('Cliente.nome', array( 'label' => false, 'tabindex' => '1', 'autocomplete' => 'off') ); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="ClienteApelido"> Apelido </label>
							<div class="controls">
								<?php echo $this->Form->input('Cliente.apelido', array( 'label' => false, 'tabindex' => '2', 'autocomplete' => 'off') ); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="ClienteFoneCelular"> Telefone Celular </label>
							<div class="controls">
								<?php echo $this->Form->input('Cliente.fone_celular', array( 'label' => false, 'tabindex' => '3', 'autocomplete' => 'off') ); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="ClienteFoneFixo"> Telefone Fixo </label>
							<div class="controls">
								<?php echo $this->Form->input('Cliente.fone_fixo', array( 'label' => false, 'tabindex' => '4', 'autocomplete' => 'off') ); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="ClienteFoneComercial"> Telefone Comercial </label>
							<div class="controls">
								<?php echo $this->Form->input('Cliente.fone_comercial', array( 'label' => false, 'tabindex' => '5', 'autocomplete' => 'off') ); ?>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="span5 right">
					<fieldset>
						<legend> Endereço </legend>
						<div class="control-group">
							<label class="control-label" for="EnderecoCep"> CEP </label>
							<div class="controls">
								<?php echo $this->Form->hidden('Endereco.id'); ?>
								<?php echo $this->Form->input('Endereco.cep', array( 'label' => false, 'tabindex' => '6',  'autocomplete' => 'off') ); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="EnderecoRua"> Rua </label>
							<div class="controls">
								<?php echo $this->Form->input('Endereco.rua', array( 'label' => false, 'tabindex' => '7', 'autocomplete' => 'off') ); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="EnderecoNumero"> Número </label>
							<div class="controls">
								<?php echo $this->Form->input('Endereco.numero', array( 'label' => false, 'tabindex' => '8', 'autocomplete' => 'off') ); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="EnderecoComplemento"> Complemento </label>
							<div class="controls">
								<?php echo $this->Form->input('Endereco.complemento', array( 'placeholder' => 'Ex: apto 101', 'label' => false, 'tabindex' => '9', 'autocomplete' => 'off') ); ?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="EnderecoBairro"> Bairro </label>
							<div class="controls">
								<?php echo $this->Form->input('Endereco.bairro', array( 'label' => false,  'tabindex' => '10', 'autocomplete' => 'off') ); ?>
							</div>
						</div>
						<!-- div class="control-group">
							<label class="control-label" for="EnderecoCidadeId"> Cidade </label>
							<div class="controls">
								<?php echo $this->Form->input('Endereco.cidade_id', array( 'label' => false, 'autocomplete' => 'off') ); ?>
							</div>
						</div -->
					</fieldset>
				</div>
				<div class="span11">
					<div class="control-group">
						<label class="control-label" for="EnderecoObservacao"> Observação </label>
						<div class="controls">
							<?php echo $this->Form->textarea('Endereco.observacao',
										array( 'label' => false, 'autocomplete' => 'off', 'tabindex' => '11', 'class' => 'span10 autogrow', 'rows' => '4') ); ?>
						</div>
					</div>
				</div>

				<div class="span11">
					<div class="form-actions">
						<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-primary', 'div' => false)); ?>
						<button class="btn" type="reset">Limpar</button>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>

		</div>
	</div>
</div>