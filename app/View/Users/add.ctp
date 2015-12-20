<div class="row-fluid sortable ui-sortable">
	<div class="box span12">
		<div data-original-title="" class="box-header well">
			<h2><i class="icon-plus"></i> Adicionar Usuário </h2>
			<div class="box-icon">
				<a class="btn btn-minimize btn-round" href="#"><i class="icon-chevron-up"></i></a>
				<a class="btn btn-close btn-round" href="#"><i class="icon-remove"></i></a>
			</div>
		</div>

		<div class="box-content">
			<?php echo $this->Form->create('User', array( 'class' => 'form-horizontal' ) ); ?>
				<fieldset>

					<div class="control-group">
						<label class="control-label" for="UserNome"> Nome </label>
						<div class="controls">
							<?php echo $this->Form->input('nome', array( 'label' => false, 'autocomplete' => 'off', 'required') ); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="UserUsername"> Login </label>
						<div class="controls">
							<?php echo $this->Form->input('username', array( 'label' => false, 'autocomplete' => 'off', 'required') ); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="UserPassword"> Senha </label>
						<div class="controls">
							<?php echo $this->Form->input('password', array( 'label' => false, 'autocomplete' => 'off', 'required') ); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="UserGroupId"> Permissão </label>
						<div class="controls">
							<?php echo $this->Form->input('group_id', array( 'label' => false, 'autocomplete' => 'off', 'required') ); ?>
						</div>
					</div>

				</fieldset>
				<div class="form-actions">
					<?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-primary', 'div' => false)); ?>
					<button class="btn" type="reset">Limpar</button>
				</div>
				<?php echo $this->Form->end(); ?>
		</div>

	</div>
</div>