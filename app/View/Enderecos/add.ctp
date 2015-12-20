<div class="enderecos form">
<?php echo $this->Form->create('Endereco'); ?>
	<fieldset>
		<legend><?php echo __('Add Endereco'); ?></legend>
	<?php
		echo $this->Form->input('cep');
		echo $this->Form->input('rua');
		echo $this->Form->input('numero');
		echo $this->Form->input('bairro');
		echo $this->Form->input('complemento');
		echo $this->Form->input('observacao');
		echo $this->Form->input('cliente_id');
		echo $this->Form->input('cidade_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Enderecos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
	</ul>
</div>
